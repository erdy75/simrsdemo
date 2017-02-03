/*
 * js-grid
 * http://atott.ru/js-grid
 *
 * Copyright (c) 2013 atott
 * Licensed under the MIT licenses.
 */

(function($) {
    function JsGrid(node, options) {
        var defaults = {
            schema: undefined,
            source: 'example.json',
            render: {},
            countPerPage: 1000000,
            renderPagination: function(jsGrid, total, countPerPage, start, page, totalPages) { },
            prepareRequest: function(page, data) { return {data: data}; },
            prepareResponse: function(page, data) { return data; },
            filter: function(row) { return true; },
            refineRow: function($tr, tow) { },
            selectable: false,
            sortRows: this.defaultSortRows
        };
        this.options = $.extend(defaults, options);
        this.$node = node;
        if (!this.options.schema) {
            this.schema = {
                columns:
                    $('th', this.$node).get().map(function(th) {
                        return {
                            field: $(th).attr('data-id') || $(th).attr('data-field'),
                            id: $(th).attr('data-id'),
                            sortable: 'true' == $(th).attr('data-sortable'),
                            width: $(th).attr('data-width')
                        };
                    })
            };
        } else {
            this.schema = {
                columns: (this.options.schema || []).map(function(column) {
                    return {
                        field: column.id,
                        id: column.id,
                        sortable: column.sortable,
                        order: column.order,
                        width: column.width,
                        title: column.title || column.id
                    };
                })
            };
            this.initializeSchemaDom();
        }
        var columnsMap = {};
        for (var i = 0; i < this.schema.columns.length; i++)
            columnsMap[this.schema.columns[i].id] = this.schema.columns[i];
        this.schema.columnsMap = columnsMap;
        this.init();
        this.load();
        this.$node.data('js-grid', this);
    }

    var fn = JsGrid.prototype;

    fn.initializeSchemaDom = function() {
        this.$node.empty();
        var thead = $('<thead></thead>');
        var tbody = $('<tbody></tbody>');

        var tr = $('<tr></tr>').append(
            this.schema.columns.map(
                function(column) {
                    var th = $('<th></th>').text(column.title);
                    if (column.sortable) {
                        th.attr('data-sortable', 'true');
                    }
                    if (column.order) {
                        th.attr('data-order', column.order);
                    }
                    th.attr('data-id', column.id);
                    if (column.width) {
                        th.attr('data-width', column.width);
                    }
                    return th;
                }
            )
        );

        thead.append(tr);
        this.$node.append(thead);
        this.$node.append(tbody);
    };

    fn.init = function() {
        var self = this;
        $('th', this.$node).each(function(i, th) {
            th = $(th);
            var columnId = th.attr('data-id');
            if (self.schema.columnsMap[columnId] && self.schema.columnsMap[columnId].sortable) {
                th.addClass('js-grid-sortable-th');
                th.click(function() {
                    self.sortByColumn(th);
                });
            }
        });
        if (this.options.selectable)
            this.$node.addClass('js-grid-hover');
        this.refine();
    };

    fn.refine = function() {
        $('th i.js-grid-order-direction', this.$node).remove();
        $('th[data-order]', this.$node).each(function(i, th) {
            th = $(th);
            var order = th.attr('data-order');
            if (order == 'asc') {
                th.append('<i class="js-grid-order-direction">&darr;</i>')
            } else {
                th.append('<i class="js-grid-order-direction">&uarr;</i>')
            }
        });
    };

    fn.sort = function(field, direction) {
        direction = direction || 'asc';
        $('th', this.$node).removeAttr('data-order');
        var $th = $('th[data-id="' + field + '"]', this.$node);
        $th.attr('data-order', direction);
        this.refine();
        this.load();
    };

    fn.sortByColumn = function(th) {
        th = $(th);
        var order = th.attr('data-order') == 'asc' ? 'desc' : 'asc';
        $('th', this.$node).removeAttr('data-order');
        th.attr('data-order', order);
        this.refine();
        this.load();
    };

    fn.setSource = function(source) {
        this.options.source = source;
        this.load();
    };

    fn.load = function(page) {
        var self = this;
        params = $.extend({ page: 0 }, { page: page });
        var queryData = this.getRequestData(params.page);
        if (!(this.options.source instanceof Array)) { // Remote data.
            var toSend = this.options.prepareRequest(params.page, queryData) || {};
            $.ajax({
                type: toSend.method || 'GET',
                url: toSend.url || this.options.source,
                data: toSend.data || queryData,
                success: function(raw) {
                    raw = self.options.prepareResponse(params.page, raw);
                    raw.list = raw.list || [];
                    self.clearGrid();
                    self.fillGrid(raw.list);
                    self.fillPagination(raw.count || raw.list.length, queryData.start, queryData.count);
                },
                dataType: 'json'
            })
        } else { // Local data.
            var list = this.options.sortRows(this.getSortFields(), this.options.source);
            list = list.slice(queryData.start, queryData.start + queryData.count);
            this.clearGrid();
            this.fillGrid(list);
            this.fillPagination(this.options.source.length, queryData.start, queryData.count);
        }
    };

    fn.defaultSortRows = function(sortFields, rows) {
        if (sortFields.length == 0) return rows;
        var field = sortFields[0].field;
        var direction = sortFields[0].direction;
        rows.sort(function(a, b) {
            var result;
            if (a[field] > b[field]) {
                result = 1;
            } else if (a[field] < b[field]) {
                result = -1;
            } else {
                result = 0;
            }
            if (direction != 'asc') {
                result = -result;
            }
            return result;
        });
        return rows;
    };

    fn.getSortFields = function() {
        var columnsMap = this.schema.columnsMap;
        return $('th[data-order]', this.$node).get().map(function(th) {
            th = $(th);
            var columnId = th.attr('data-id');
            var field = columnsMap[columnId].field;
            return {field: field, direction: th.attr('data-order')};
        });
    };

    fn.getRequestData = function(page) {
        var queryData = {
            start: page * this.options.countPerPage,
            count: this.options.countPerPage
        };
        queryData.sortFields = this.getSortFields();
        return queryData;
    };

    fn.refresh = function() {
        this.clearGrid();
        this.fillGrid(this.previousRows);
    };

    fn.fillPagination = function(count, start, countPerPage) {
        this.options.renderPagination(this,
            count,
            countPerPage,
            start,
            Math.round(start / countPerPage),
            Math.max(1, Math.ceil(count / countPerPage)));
    };

    fn.fillGrid = function(rows) {
        rows = rows || [];
        var self = this;
        this.previousRows = rows;
        rows = rows.filter(this.options.filter);
        var defaultRenderer = function(column, row) {
            return self.escapeHtml(row[column.field]);
        };
        var rowElements = rows.map(function(row) {
            var tr = $('<tr />').append(
                self.schema.columns.map(
                    function(column) {
                        var renderer = self.options.render[column.id] || defaultRenderer;
                        var td = $('<td />').html(renderer(column, row));
                        if (column.width)
                            td.css('width', column.width);
                        return td;
                    }
                )
            );
            self.options.refineRow(tr, row);
            tr.data('row', row);
            return tr;
        });
        $('tbody', this.$node).append(rowElements);
        if (this.options.selectable) {
            $('tbody tr', this.$node).click(function() {
                $('tr', self.$node).removeClass('js-grid-selected');
                $(this).addClass('js-grid-selected');
                var $tr = $(this);
                setTimeout(function() {
                    self.$node.trigger('selection-changed', [[$tr.data('row')], [$tr]]);
                }, 1);
            });
        }
        this.$node.data('rows', rows);
    };

    fn.escapeHtml = function(s) {
        if (!s) return s;
        if (typeof s != 'string') return s;
        var tagsToReplace = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;'
        };
        return s.replace(/[&<>]/g, function(tag) {
            return tagsToReplace[tag] || tag;
        });
    };

    fn.getSelection = function() {
        return $('tbody tr.js-grid-selected', this.$node).map(function(i, e) {
            return $(e).data('row');
        }).get();
    };

    fn.clearGrid = function() {
        $('tbody tr', this.$node).remove();
        if (this.options.selectable)
            this.$node.trigger('selection-changed', [[], []]);
    };

    fn.getRows = function() {
        return this.previousRows || [];
    };

    // jQuery adapter.
    $.fn.jsGrid = function(options) {
        return this.each(function() {
            if (!$(this).data('js-grid')) {
                $(this).data('js-grid', new JsGrid($(this), options));
            }
        });
    };
})(jQuery);