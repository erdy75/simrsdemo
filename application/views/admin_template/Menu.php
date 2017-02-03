<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=base_url()?>assets/admin_lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=$nama;?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">

      <li class="treeview" id="GUDANG_LOGISTIK">
         <a href="#">
          <i class="fa fa-folder"></i> 
          <span>Gudang Logistik</span>
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
			  <i class="fa fa-folder"></i> 
			  <span>Personalia</span>
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
			  <i class="fa fa-folder"></i> 
			  <span>Laboratorium</span>
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
       
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>