<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?= $this->session->userdata('nama'); ?></p>
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
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('dashboard1') ?>"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="<?php echo site_url('dashboard2') ?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
            </li>			
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Registrasi</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
					<li><a href="<?php echo site_url('registrasi/nm_unit/registrasi') ?>"><i class="fa fa-circle-o"></i>Reg. R Jalan</a></li>
                    <li><a href="<?php echo site_url('rawat_inap/registrasi') ?>"><i class="fa fa-circle-o"></i>Reg. Rawat Inap</a></li>
                    <li><a href="<?php echo site_url('paket/registrasi') ?>"><i class="fa fa-circle-o"></i>Reg. Paket</a></li>
                    <li><a href="<?php echo site_url('pasien_baru/registrasi') ?>"><i class="fa fa-circle-o"></i>Pasien Baru</a></li>
                    <li><a href="<?php echo site_url('cetak_kartu/registrasi') ?>"><i class="fa fa-circle-o"></i>Cetak Kartu</a></li>
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-medkit"></i> <span>IGD/UGD</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('tindakan/nm_unit/igd') ?>"><i class="fa fa-circle-o"></i>Pendaftaran</a></li>
                    <li><a href="<?php echo site_url('tindakan/mulai_tindakan') ?>"><i class="fa fa-circle-o"></i>Tindakan IGD</a></li>
					<li><a href="<?php echo site_url('tindakan/pembayaran') ?>"><i class="fa fa-circle-o"></i>Kepulangan Pasien</a></li>
					<li><a href="<?php echo site_url('gudang/unit_order/UGD/IGD') ?>"><i class="fa fa-circle-o"></i>Form Pemesanan Gudang</a></li>
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
					<i class="fa fa-files-o"></i> <span>Gudang Besar</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('gudang/kirim_pesanan') ?>"><i class="fa fa-circle-o"></i> Pesanan Unit Kerja</a></li>
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-hospital-o"></i>
                    <span>Rawat Inap</span>
					 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('rinap/setting_kamar') ?>"><i class="fa fa-circle-o"></i> Setting Kamar</a></li>
					<li><a href="<?php echo site_url('rinap/visite') ?>"><i class="fa fa-circle-o"></i> RM, Visit Dokter</a></li>
					<li><a href="<?php echo site_url('rinap/tindakan_ranap') ?>"><i class="fa fa-circle-o"></i>Tagihan Rawat Inap</a></li>
					<li><a href="<?php echo site_url('rajal/permintaan/RINAP') ?>"><i class="fa fa-circle-o"></i>Permintaan Barang</a></li>
					<li><a href="<?php echo site_url('rajal/purchasing/RINAP') ?>"><i class="fa fa-circle-o"></i>Permintaan Purchasing</a></li>
					<li><a href="<?php echo site_url('laporan_rinap/laporan_rinap') ?>"><i class="fa fa-circle-o"></i>Lap.R.Inap</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wheelchair"></i>
                    <span>Rawat Jalan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('rajal/pemeriksaan') ?>"><i class="fa fa-circle-o"></i>Pemeriksaan</a></li>
                    <li><a href="<?php echo site_url('rajal/permintaan') ?>"><i class="fa fa-circle-o"></i>Permintaan Barang</a></li>
                    <li><a href="<?php echo site_url('rajal/penerimaan') ?>"><i class="fa fa-circle-o"></i>Stock & Penerimaan</a></li>
					<li><a href="<?php echo site_url('rajal/purchasing') ?>"><i class="fa fa-circle-o"></i>Permintaan Purchasing</a></li>
					<li><a href="<?php echo site_url('rajal/rekmed') ?>"><i class="fa fa-circle-o"></i>Rekapan Rekam Medis</a></li>
					<li><a href="<?php echo site_url('rajal/lapjasmed') ?>"><i class="fa fa-circle-o"></i>Laporan Jasa Medis Dokter</a></li>
                </ul>
            </li> 
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Kasir</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('kasir/pembayaran_rajal') ?>"><i class="fa fa-circle-o"></i> Pembayaran RAJAL</a></li>
					<li><a href="<?php echo site_url('kasir/pembayaran') ?>"><i class="fa fa-circle-o"></i> Pembayaran RANAP</a></li>
                    <li><a href="<?php echo site_url('kasir/deposit') ?>"><i class="fa fa-circle-o"></i> Deposit</a></li>
                    <li><a href="<?php echo site_url('kasir/angsuran') ?>"><i class="fa fa-circle-o"></i> Angsuran</a></li>
					<li><a href="<?php echo site_url('kasir/laporan') ?>"><i class="fa fa-circle-o"></i> Laporan</a></li>
                </ul>
            </li>
           <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-glass"></i> <span>Farmasi</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
					<li><a href="<?php echo site_url('transaksi/farmasi') ?>"><i class="fa fa-circle-o"></i>Transaksi</a></li>
					<li><a href="<?php echo site_url('retur/farmasi') ?>"><i class="fa fa-circle-o"></i>Retur</a></li>
					<li><a href="<?php echo site_url('penyerahan_obat/farmasi') ?>"><i class="fa fa-circle-o"></i>Penyerahan Obat</a></li>
                    <li><a href="<?php echo site_url('purchasing/farmasi') ?>"><i class="fa fa-circle-o"></i>Form Purchasing</a></li>	
					<li><a href="<?php echo site_url('history/farmasi') ?>"><i class="fa fa-circle-o"></i>Form History Obat</a></li>	
					<li><a href="<?php echo site_url('stock_apotek/farmasi') ?>"><i class="fa fa-circle-o"></i>Stock Apotek</a></li>	
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Radiologi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('radiologi/pemeriksaan') ?>"><i class="fa fa-circle-o"></i> Pemeriksaan</a></li>
                    <li><a href="<?php echo site_url('radiologi/hasil_pemeriksaan') ?>"><i class="fa fa-circle-o"></i> Hasil Pemeriksaan</a></li>
					<li><a href="<?php echo site_url('rajal/permintaan/RAD') ?>"><i class="fa fa-circle-o"></i>Permintaan Barang</a></li>
					<li><a href="<?php echo site_url('rajal/purchasing/RAD') ?>"><i class="fa fa-circle-o"></i>Permintaan Purchasing</a></li>
					<li><a href="<?php echo site_url('stock_inventaris/stock_unit/RAD') ?>"><i class="fa fa-circle-o"></i>Stock & Inventaris</a></li>
					<li><a href="<?php echo site_url('radiologi/laporan') ?>"><i class="fa fa-circle-o"></i> Laporan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-eye-slash"></i> <span>Kamar Operasi</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
				<ul class="treeview-menu">
                    <li><a href="<?php echo site_url('operasi/registrasi') ?>"><i class="fa fa-circle-o"></i> Registrasi</a></li>
                    <li><a href="<?php echo site_url('operasi/jadwal') ?>"><i class="fa fa-circle-o"></i>Jadwal Ruang</a></li>
					<li><a href="<?php echo site_url('operasi/laporan') ?>"><i class="fa fa-circle-o"></i> Laporan</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-foursquare"></i> <span>Fisioterapi</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('fisioterapi/nm_unit/fisioterapi') ?>"><i class="fa fa-circle-o"></i>Pendaftaran Fisioterapi</a></li>
					<li><a href="<?php echo site_url('rm_fisioterapi/nm_unit/fisioterapi') ?>"><i class="fa fa-circle-o"></i>RM Fisioterapi</a></li>
                    <li><a href="<?php echo site_url('tagihan_pasien/nm_unit/fisioterapi') ?>"><i class="fa fa-circle-o"></i>Tagihan Pasien</a></li>
                    <li><a href="<?php echo site_url('stock_inventaris/nm_unit/fisioterapi') ?>"><i class="fa fa-circle-o"></i>Stock & Inventaris</a></li>
					<li><a href="<?php echo site_url('laporan_fisioterapi/nm_unit/laporan_fisioterapi') ?>"><i class="fa fa-circle-o"></i>Laporan</a></li>
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-cutlery"></i> <span>Gizi</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('pasien_rawat_inap/nm_unit/gizi') ?>"><i class="fa fa-circle-o"></i>Pasien Rawat Inap</a></li>
                    <li><a href="<?php echo site_url('setting_menu_makanan/nm_unit/gizi') ?>"><i class="fa fa-circle-o"></i>Setting Menu Makanan</a></li>
                    <li><a href="<?php echo site_url('angka_kecukupan_gizi/nm_unit/gizi') ?>"><i class="fa fa-circle-o"></i>Angka Kecukupan Gizi</a></li>
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-dollar"></i> <span>Akutansi</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('transaksi_sia/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Transaksi SIA</a></li>
					<li><a href="<?php echo site_url('pendapatan_rs/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Pendapatan RS</a></li>
					<li><a href="<?php echo site_url('set_harga/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Set Harga</a></li>
					<li><a href="<?php echo site_url('set_fee_dokter/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Set Fee Dokter</a></li>
					<li><a href="<?php echo site_url('jasa_medis/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Jasa Medis</a></li>
					<li><a href="<?php echo site_url('bayar_hutang_cod/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Bayar Hutang & COD</a></li>
					<li><a href="<?php echo site_url('report_akutansi/nm_unit/akutansi') ?>"><i class="fa fa-circle-o"></i>Report</a></li>
               </ul>
            </li>
			<li class=="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-credit-card"></i> <span>Purchasing</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('purchasing/list_req') ?>"><i class="fa fa-circle-o"></i> List Request</a></li>
                    <li><a href="<?php echo site_url('purchasing/penetapan_req') ?>"><i class="fa fa-circle-o"></i> Penetapan Order</a></li>
                    <li><a href="<?php echo site_url('purchasing/master_barang') ?>"><i class="fa fa-circle-o"></i> Master Barang</a></li>
					<li><a href="<?php echo site_url('purchasing/master_supplier') ?>"><i class="fa fa-circle-o"></i> Supplier</a></li>
					<li><a href="<?php echo site_url('purchasing/lap_request') ?>"><i class="fa fa-circle-o"></i> Laporan</a></li>
                </ul>
            </li>
            <li class<li class="treeview">
				<a href="#">
					<i class="fa fa-flask"></i> 
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
							<li id="bidang-pemeriksaan"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Bidang Pemeriksaan</a></li>
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
							<li id="tarif-laboratorium"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Tarif Laboratorium</a></li>
							<li id="def-kel-tarif"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Default kel.Tarif</a></li>
						</ul>
					</li> 
					<li id="laporan">
						<a href="#">
							<i class="fa fa-circle-o"></i> 
								<span>Laporan</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li id="rekap-transaksi-lab"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Rekap Transaksi Lab</a></li>
							<li id="page-setup"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Rekap Hasil Lab</a></li>
							<li id="rincian-hasil-lab"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Rincian Hasil Lab</a></li>
							<li id="rekam-medis-lab"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Rekam Medis Lab</a></li>
							<li id="rekap-lap-spesimen"><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i>Rekap Lap.Spesimen</a></li>
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
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Penjamin</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('penjamin/list_penjamin') ?>"><i class="fa fa-circle-o"></i> List Penjamin</a></li>
					<li><a href="<?php echo site_url('penjamin/set_tindakan') ?>"><i class="fa fa-circle-o"></i> Set Layanan</a></li>
					<li><a href="<?php echo site_url('penjamin/add_peserta') ?>"><i class="fa fa-circle-o"></i> Input Peserta</a></li>
					<li><a href="<?php echo site_url('penjamin/tagihan_penjamin') ?>"><i class="fa fa-circle-o"></i> Tagihan</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-book"></i> Documentation</a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">