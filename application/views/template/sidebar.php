<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/risa5.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Taufik Hidayah</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>REGISTRASI</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	 <li><a href="<?php echo site_url('registrasi/nm_unit/registrasi') ?>"><i class="fa fa-circle-o"></i>Reg. R Jalan</a></li>
                    <li><a href="<?php echo site_url('rawat_inap/nm_unit/registrasi') ?>"><i class="fa fa-circle-o"></i>Reg. Rawat Inap</a></li>
                    <li><a href="<?php echo site_url('paket/nm_unit/registrasi') ?>"><i class="fa fa-circle-o"></i>Reg. Paket</a></li>
                    <li><a href="<?php echo site_url('pasien_baru/nm_unit/registrasi') ?>"><i class="fa fa-circle-o"></i>Pasien Baru</a></li>
                    <li><a href="<?php echo site_url('cetak_kartu/nm_unit/registrasi') ?>"><i class="fa fa-circle-o"></i>Cetak Kartu</a></li>
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-medkit"></i> <span>IGD/UGD</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('tindakan/nm_unit/igd') ?>"><i class="fa fa-circle-o"></i>Pendaftaran</a></li>
                    <li><a href="<?php echo site_url('pendaftaran/nm_unit/igd') ?>"><i class="fa fa-circle-o"></i>Tindakan IGD</a></li>
					<li><a href="<?php echo site_url('percobaan/nm_unit/igd') ?>"><i class="fa fa-circle-o"></i>Percobaan</a></li>
					
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-glass"></i> <span>FARMASI</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
					<li><a href="<?php echo site_url('transaksi/nm_unit/farmasi') ?>"><i class="fa fa-circle-o"></i>Transaksi</a></li>
					<li><a href="<?php echo site_url('retur/nm_unit/farmasi') ?>"><i class="fa fa-circle-o"></i>Retur</a></li>
					<li><a href="<?php echo site_url('penyerahan_obat/nm_unit/farmasi') ?>"><i class="fa fa-circle-o"></i>Penyerahan Obat</a></li>
                    <li><a href="<?php echo site_url('purchasing/nm_unit/farmasi') ?>"><i class="fa fa-circle-o"></i>Form Purchasing</a></li>	
					<li><a href="<?php echo site_url('history/nm_unit/farmasi') ?>"><i class="fa fa-circle-o"></i>Form History Obat</a></li>	
					<li><a href="<?php echo site_url('stock_apotek/nm_unit/farmasi') ?>"><i class="fa fa-circle-o"></i>Stock Apotek</a></li>	
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-foursquare"></i> <span>FISIOTERAPI</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	 <li><a href="<?php echo site_url('fisioterapi/nm_unit/fisioterapi') ?>"><i class="fa fa-circle-o"></i>Fisioterapi</a></li>
                    <li><a href="<?php echo site_url('rm_fisioterapi/nm_unit/fisioterapi') ?>"><i class="fa fa-circle-o"></i>RM Fisioterapi</a></li>
                    <li><a href="<?php echo site_url('tagihan_pasien/nm_unit/fisioterapi') ?>"><i class="fa fa-circle-o"></i>Tagihan Pasien</a></li>
                     <li><a href="<?php echo site_url('laporan_fisioterapi/nm_unit/laporan_fisioterapi') ?>"><i class="fa fa-circle-o"></i>Laporan</a></li>
                    <li><a href="<?php echo site_url('stock_inventaris/nm_unit/fisioterapi') ?>"><i class="fa fa-circle-o"></i>Stock & Inventaris</a></li>
                     <li><a href="<?php echo site_url('gudang_fisioterapi/nm_unit/gudang_fisioterapi') ?>"><i class="fa fa-circle-o"></i>Form Gudang</a></li>
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-cutlery"></i> <span>GIZI</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	<li><a href="<?php echo site_url('dietmakanan/nm_unit/dietmakanan') ?>"><i class="fa fa-circle-o"></i>Diet & Bahan Makanan</a></li>
                    <li><a href="<?php echo site_url('pasien_rawat_inap/nm_unit/gizi') ?>"><i class="fa fa-circle-o"></i>Pasien Rawat Inap</a></li>
                    <li><a href="<?php echo site_url('setting_menu_makanan/nm_unit/gizi') ?>"><i class="fa fa-circle-o"></i>Setting Menu Makanan</a></li>
                    <li><a href="<?php echo site_url('angka_kecukupan_gizi/nm_unit/gizi') ?>"><i class="fa fa-circle-o"></i>Angka Kecukupan Gizi</a></li>
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-dollar"></i> <span>AKUTANSI</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('transaksi_sia/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Transaksi SIA</a></li>
                     
                     <li><a href="<?php echo site_url('master_cia/nm_unit/master_cia') ?>"><i class="fa fa-circle-o"></i>Master CIA</a></li>
                     
                     
                     <li><a href="<?php echo site_url('laporan_sia/nm_unit/laporan_sia') ?>"><i class="fa fa-circle-o"></i>Laporan SIA</a></li>
                    
					<li><a href="<?php echo site_url('pendapatan_rs/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Pendapatan RS</a></li>
					 
                     <li><a href="<?php echo site_url('deposit/nm_unit/deposit') ?>"><i class="fa fa-circle-o"></i>Deposit</a></li>
                    
					<li><a href="<?php echo site_url('set_harga/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Set Harga</a></li>
					<li><a href="<?php echo site_url('set_fee_dokter/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Set Fee Dokter</a></li>
					<li><a href="<?php echo site_url('jasa_medis/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Jasa Medis</a></li>
					<li><a href="<?php echo site_url('bayar_hutang_cod/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Bayar Hutang & COD</a></li>
					
                     <li><a href="<?php echo site_url('piutang_pasien/nm_unit/piutang_pasien') ?>"><i class="fa fa-circle-o"></i>Piutang Pasien</a></li>
                  
					<li><a href="<?php echo site_url('report_akutansi/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Report</a></li>
               </ul>
            </li>
			<li class="treeview" id="GUDANG_LOGISTIK">
				 <a href="#">
				  <i class="fa fa-shopping-cart"></i> 
				  <span>GUDANG LOGISTIK</span>
				  <i class="fa fa-angle-left pull-right"></i>
				</a>   
				<ul class="treeview-menu">
				  <li id="penerimaan">
					<a href="<?=base_url()?>index.php/gudang_logistik/penerimaan">
					  <i class="fa fa-circle-o"></i> 
					  <span>Penerimaan</span>
					</a>
				  </li>
				  <li id="master-item-barang1">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Master Item / Barang</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="master-item-barang2">
						<a href="<?=base_url()?>index.php/gudang_logistik/master_item_barang/">
						  <i class="fa fa-circle-o"></i>Master Item / Barang
						</a>
					  </li>
					  <li id="setup-lainnya">
						<a href="<?=base_url()?>index.php/gudang_logistik/setup_lainnya/">
						  <i class="fa fa-circle-o"></i>Setup Lainya
						</a>
					  </li>
					</ul>
				  </li>
				  <li id="stock-n-inventaris">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Stock & Inventaris</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="master-item-barang2s">
						<a href="<?=base_url()?>index.php/gudang_logistik/master_item_barang/">
						  <i class="fa fa-circle-o"></i>Stock di Gudang
						</a>
					  </li>
					  <li id="daftar-inventaris">
						<a href="<?=base_url()?>index.php/gudang_logistik/daftar_inventaris/">
						  <i class="fa fa-circle-o"></i>Daftar Inventaris
						</a>
					  </li>
					</ul>
				  </li>
				  <li id="kartu-stock">
					<a href="<?=base_url()?>index.php/gudang_logistik/kartu_stock/">
					  <i class="fa fa-circle-o"></i> 
					  <span>Kartu Stock</span>
					</a>
				  </li>
				  <li id="kirim-ke-unit">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Kirim Ke Unit</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="kirim-stock">
						<a href="<?=base_url()?>index.php/gudang_logistik/kirim_stock/">
						  <i class="fa fa-circle-o"></i>Kirim Ke Stock
						</a>
					  </li>
					  <li id="kirim-inventaris">
						<a href="<?=base_url()?>index.php/gudang_logistik/kirim_inventaris/">
						  <i class="fa fa-circle-o"></i>kirim Inventaris
						</a>
					  </li>
					</ul>
				  </li> 
				  <li id="retur-supplier">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Retur Supplier</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="penyerahan-retur-supplier">
						<a href="<?=base_url()?>index.php/gudang_logistik/penyerahan_retur_supplier/">
						  <i class="fa fa-circle-o"></i>Penyerahan Retur Supplier
						</a>
					  </li>
					  <li id="pengembalian-retur-supplier">
						<a href="<?=base_url()?>index.php/gudang_logistik/kirim_inventaris/">
						  <i class="fa fa-circle-o"></i>Pengembalian Retur Supplier
						</a>
					  </li>
					</ul>
				  </li>          
				</ul>
			</li>
			<li class="treeview" id="PERSONALIA">
				<a href="#">
				  <i class="fa fa-male"></i> 
				  <span>PERSONALIA</span>
				  <i class="fa fa-angle-left pull-right"></i>
				</a>   
				<ul class="treeview-menu">
				  <li id="daftar-dokter">
					<a href="<?=base_url()?>index.php/personalia/daftar_dokter">
					  <i class="fa fa-circle-o"></i> 
					  <span>Daftar Dokter</span>
					</a>
				  </li>
				  <li id="daftar-karyawan">
					<a href="<?=base_url()?>index.php/personalia/daftar_karyawan">
					  <i class="fa fa-circle-o"></i> 
					  <span>Daftar Karyawan</span>
					</a>
				  </li>
				  <li id="jasa-medis">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Jasa Medis</span>
					</a>
				  </li>
				  <li id="gaji-dokter-n-karyawan">
					<a href="<?=base_url()?>index.php/personalia/gaji_dokter_n_karyawan">
					  <i class="fa fa-circle-o"></i> 
					  <span>Gaji Dokter & Karyawan</span>
					</a>
				  </li>
				  <li id="rekapitulasi-gaji">
					<a href="<?=base_url()?>index.php/personalia/rekapitulasi_gaji">
					  <i class="fa fa-circle-o"></i> 
					  <span>Rekapitulasi Gaji</span>
					</a>
				  </li>
				</ul>
			</li>

			<li class="treeview" id="LABORTORIUM">
				<a href="#">
				  <i class="fa fa-flask"></i> 
				  <span>LABORATORIUM</span>
				  <i class="fa fa-angle-left pull-right"></i>
				</a>   
				<ul class="treeview-menu">
				  <li id="pemeriksaan">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Pemeriksaan</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="transaksi"><a href="<?=base_url()?>index.php/laboratorium/Transaksi/"><i class="fa fa-circle-o"></i>Transaksi</a></li>
					  <li id="setting-transaksi"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Setting Transaksi</a></li>
					  <li id="pasien-laboratorium"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Pasien Laboratorium</a></li>
					  <li id="permintaan-pemeriksaan"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Permintaan Pemeriksaan</a></li>
					</ul>
				  </li>
				  <li id="hasillab">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Hasil Lab</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="hsl-periksa-lab"><a href="<?=base_url()?>index.php/laboratorium/Form_hasil_pemeriksaan_lab/hasil/1"><i class="fa fa-circle-o"></i>Form Hasil Pemeriksaan Lab</a></li>
					  <li id="page-setup"><a href="<?=base_url()?>index.php/laboratorium/Form_hasil_pemeriksaan_lab/page_setup"><i class="fa fa-circle-o"></i>Page Setup</a></li>
					  <li id="LIS"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>LIS (Labrotory Information System)</a></li>
					</ul>
				  </li>
				  <li id="set-pemeriksaan">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Set Pemeriksaan</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="bidang-pemeriksaan"><a href="<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/"><i class="fa fa-circle-o"></i>Bidang Pemeriksaan</a></li>
					  <li id="nama-pemeriksaan"><a href="<?=base_url()?>index.php/laboratorium/nama_pemeriksaan/"><i class="fa fa-circle-o"></i>Nama Pemeriksaan</a></li>
					</ul>
				  </li>
				  <li id="setup-hasil"><a href="#"><i class="fa fa-circle-o"></i>Setup Hasil</a></li>
				  <li id="tarif-lab">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Tarif Lab</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="tarif-laboratorium"><a href="<?=base_url()?>index.php/laboratorium/tarif_laboratorium"><i class="fa fa-circle-o"></i>Tarif Laboratorium</a></li>
					  <li id="def-kel-tarif"><a href="<?=base_url()?>index.php/laboratorium/tarif_laboratorium/def_kel_tarif"><i class="fa fa-circle-o"></i>Default kel.Tarif</a></li>
					</ul>
				  </li> 
				  <li id="laporan">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Laporan</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="rekap-transaksi-lab"><a href="<?=base_url()?>index.php/laboratorium/rekap_lab_transaksi/"><i class="fa fa-circle-o"></i>Rekap Transaksi Lab</a></li>
					  <li id="rekap-hasil-lab"><a href="<?=base_url()?>index.php/laboratorium/rekap_hasil_lab/"><i class="fa fa-circle-o"></i>Rekap Hasil Lab</a></li>
					  <li id="rincian-hasil-lab"><a href="<?=base_url()?>index.php/laboratorium/rincian_hasil_lab/"><i class="fa fa-circle-o"></i>Rincian Hasil Lab</a></li>
					  <li id="rekam-medis-lab"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Rekam Medis Lab</a></li>
					  <li id="rekap-lap-spesimen"><a href="<?=base_url()?>index.php/laboratorium/rekap_lap_spesimen/"><i class="fa fa-circle-o"></i>Rekap Lap.Spesimen</a></li>
					  <li id="rangkuman-transaksi"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Rangkuman Transaksi</a></li>
					</ul>
				  </li>
				  <li id="cari-pasien">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Cari Pasien</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="maaster-pasien"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Master Pasien</a></li>
					  <li id="pasien-registrasi"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Pasien Ter-registrasi</a></li>
					</ul>
				  </li> 
				  <li id="stock-inventaris">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Stock & Inventeris</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="stock-unit"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Stock Unit</a></li>
					  <li id="daftar-inventaris"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Daftar Inventaris</a></li>
					  <li id="penerimaan-stock"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Penerimaan Stock</a></li>
					  <li id="kartu-stock"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Kartu Stock</a></li>
					  <li id="history-transaksi-gudang-kecil"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>History Transaksi Gudang Kecil</a></li>
					  <li id="history-penerimaan"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>History Penerimaan</a></li>
					</ul>
				  </li>
				  <li id="form-gudang">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Form Gudang</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="form-permintaan-gudang"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Form Permintaan Ke Gudang</a></li>
					  <li id="daftar-permintaan"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Daftar Permintaan</a></li>
					  <li id="history-permintaan"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>History Permintaan</a></li>
					  <li id="cari-barang"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Cari Barang</a></li>
					</ul>
				  </li> 
				  <li id="form-purchasing">
					<a href="#">
					  <i class="fa fa-circle-o"></i> 
					  <span>Form Purchasing</span>
					  <i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
					  <li id="form-request-purchasing"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Form Request ke Purchasing</a></li>
					  <li id="request-bag-pembelian"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Request di Bag.Pembelian : LAB</a></li>
					  <li id="cari-barang2"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Cari Barang</a></li>
					</ul>
				  </li>
				</ul>  
			</li>
			
            <li><a href="#"><i class="fa fa-book"></i> Documentation</a></li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">