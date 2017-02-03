<head>
<link rel="stylesheet" href="../../../assets/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="../../../assets/select2/dist/css/select2.css">
<link rel="stylesheet" href="../../../assets/DataTables/css/jquery.dataTables.css">
<link rel="stylesheet" href="../../../assets/DataTables/css/dataTables.tableTools.css">
<link rel="stylesheet" href="../../../assets/DataTables/css/font-awesome.css">
<style type="text/css">
 .display
    tr td:first-child {
        text-align: center;
    }
 
    tr td:first-child:before {
        content: "\f096"; /* fa-square-o */
        font-family: FontAwesome;
    }
 
    tr.selected td:first-child:before {
        content: "\f046"; /* fa-check-square-o */
    }
</style>
</head>

<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
		Form Transaksi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FARMASI</a></li>
        <li class="active">Transaksi</li>
    </ol>
</section>

<!-- Main content -->

<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->
				
				<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="nav-tabs-custom" id="tab_transaksi">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Transaksi</a></li>
								<li><a href="#tab_2" data-toggle="tab">Setting</a></li>
							</ul>	
							
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1" style="position: relative; ">
									<div class="box-body">
										
										<div class="row">
											<div class="row">
											
												<div class="col-sm-5">
													<div class="form-group">
														
														<div class="row">
															<label for="inputEmail3" style="width:75px;" class="col-sm-2 control-label">No Reg</label>
															<div class="col-lg-4" >
																<input type="text" class="form-control" name="noreg" id="noreg"  placeholder="">
															</div>
																<button type="button" id="btn_refresh" class="btn btn-primary"><i class="fa fa-refresh"></i>	Refresh</button>		
														</div>	
																
														<div class="row">	
															<label for="inputEmail3" style="width:75px;" class="col-sm-2 control-label">No RM</label>
															<div class="col-lg-4" >
																<input type="text" class="form-control" name="norm" id="norm"  placeholder="">
															</div>
																<button type="button" id="btn_auto" class="btn btn-primary"><i class="fa fa-refresh"></i>	</button>	
																<button type="button" style="margin-left:1%;" id="btn_newfile" class="btn btn-danger"><i class="fa fa-edit"></i>	</button>											
														</div>
													</div>
													
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:75px;" class="col-sm-2 control-label">Nama</label>
															<div class="col-lg-9" >
																<input type="text" class="form-control" name="nama" id="nama"  placeholder="">
															</div>										
														</div>
															
													</div>	
													
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">Jenis Px</label>
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_jenispx" id="combo_jenispx" style="width: 120%;"	>
																	<option selected="selected">==PILIH==</option>
																	<option>UMUM</option>
																	<option>ASURANSI</option>
																	<option>KARYAWAN</option>
																</select>
															</div>									
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">Pembayaran</label>
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_pembayaran1" id="combo_pembayaran1" style="width: 120%;">
																	<option selected="selected">==PILIH==</option>
																	<option>CASH</option>
																	<option>CREDIT CARD</option>
																	<option>DEBIT CARD</option>
																	<option>CREDIT</option>
																</select>
															</div>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control" style="margin-left:20px;" name="combo_pembayaran2" id="combo_pembayaran2" style="width: 100%;" >
																	<option selected="selected">==PILIH==</option>
																	<option>RESEP</option>
																	<option>BELI BEBAS</option>
																</select>
															</div>									
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">Penjamin</label>
															<div class="col-lg-9" >
																<select class="col-sm-2 form-control"  name="combo_penjamin" id="combo_penjamin" style="width: 106%;" disabled="false">
																	<option selected="selected">==PILIH==</option>
																</select>
															</div>									
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">Embalase</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="embalase" id="embalase"  disabled=false>
															</div>	
																<label for="inputEmail3" style="margin-left:-20;width:5px;" class="col-sm-2 control-label">(Poin)</label>								
														</div>
															
													</div>
												</div>
												
												<div class="col-sm-5">
													<div class="form-group">
														<div class="row">
															<div class="col-lg-5" >
																<label><input type="checkbox" style="width:50px;" name="cek_koreksi" id="cek_koreksi">Koreksi Nota</label>
															</div>
															<div class="col-lg-3" >
																<input type="text" style="width:130%;" class="form-control" name="koreksinota" id="koreksinota" disabled="false">
															</div>
																<button type="button" style="margin-left:5%;" id="btn_koreksi" class="btn btn-danger"	disabled="false"><i class="fa fa-check"></i> Koreksi</button>		
														</div>
														<div class="row">
															<div class="col-lg-5" >
																<label><input type="checkbox" style="width:50px;" name="cek_entrytgl" id="cek_entrytgl">Entry Tanggal</label>
															</div>
															<div class="col-lg-6" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="entrytgl" id="entrytgl" disabled="false" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
																</div> 
															</div>
														</div>
													</div>
													
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="margin-left:4%;" class="col-sm-2 control-label">Perawatan</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_perawatan1" id="combo_perawatan1" style="width: 130;">
																	<option selected="selected">==PILIH==</option>
																	<?php foreach ($dt_perawatan1 as $perawatan1) { ?>	
																		<option value="<?php echo $perawatan1["nama"]; ?>"><?php echo $perawatan1["nama"]; ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-lg-6" id="tampilcombo_perawatan2" >
																<select class="col-sm-2 form-control"  name="combo_perawatan2" id="combo_perawatan2" style="margin-left:4%;width: 100%;">
																	<option selected="selected">==PILIH==</option>
																</select>
															</div>									
														</div>
														<div class="row">	
															<label for="inputEmail3"  style="margin-left:4%;" class="col-sm-2 control-label">Dokter</label>														
															<div class="col-lg-7" >	
																<select class="col-sm-2 form-control"  name="combo_dokter" id="combo_dokter" style="width:135%;" >																	
																	<option selected="selected">==PILIH==</option>
																	<?php foreach ($dt_nama_dokter as $dt_namadokter) { ?>
																		<option ><?php echo $dt_namadokter['nama']; ?></option>
																	<?php } ?>																
																</select>	
															</div>
														</div>
													</div>
													
												</div>
											
											</div>
														
																			
											
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<table id="list_transaksi1" class="table table-bordered table-hover display"	>
																<thead>
																	<tr>
																		<th></th>
																		<th>Nama Item/Barang</th>
																		<th>Harga(+Disc%)</th>
																		<th>Kuantitas</th>
																		<th>Jumlah</th>
																		<th>Disc</th>
																	</tr>
																</thead>
															</table>												
														</div>								
													</div>
												</div>	
												
											
											<div class="row">
												<div class="col-sm-7">
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="width:110px;" class="col-sm-2 control-label">Barang</label>
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_barang" id="combo_barang" style="width: 100%;"></select>
															</div>	
														</div>	
														<div class="row">	
															<label for="inputEmail3" style="width:110px;" class="col-sm-2 control-label">Quantity</label>
															<div class="col-lg-2" >
																<input type="number" class="form-control" name="quantity" id="quantity"  min="1" max="100">
															</div>
																<label for="inputEmail3" style="margin-left:-20px;width:10px;" id="satuan" class="col-sm-2 control-label">[satuan]</label>	
																<label for="inputEmail3" style="margin-left:25px;width:10px;" class="col-sm-2 control-label">Stock:</label>	
																<label for="inputEmail3" style="margin-left:15px;width:10px;" id="stock" class="col-sm-2 control-label">[Jumlah]</label>	
														</div>
																
														<div class="row">	
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control" style="margin-left:110px;width:169px;" name="combo_diskon" id="combo_diskon" style="width:100%;">
																	<option>Disc Semua Item</option>
																	<option>Disc Per Item</option>
																	<option>Set Disc Sekarang</option>
																</select>
															</div>
															<div class="col-lg-2" >
																<input type="number" class="form-control" style="width:70px;" name="diskon" id="diskon" value ="0" min="0" max="100">
															</div>
																<label for="inputEmail3" style="margin-left:-40px;" class="col-sm-2 control-label">%</label>
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:110px;" class="col-sm-2 control-label">Harga</label>
															<div class="col-lg-1" >
																<input type="checkbox" style="margin-left:10px;" name="cek_harga" id="cek_harga" value="cek_harga">																
															</div>
															<div class="col-lg-2" >
																<input type="text" class="form-control" style="margin-left:-30px;width:140px;" name="harga" id="harga" value="0" disabled="false" placeholder="">
															</div>															
														</div>															
														<div class="row">		
															<label for="inputEmail3" style="width:110px;" class="col-sm-2 control-label">Remark</label>
															<div class="col-lg-1" >
																<input type="text" class="form-control" style="width:169px;" name="remark" id="remark"  placeholder="">
															</div>															
														</div>	
													</div>
													<div class="form-group">
														<div class="row">
															<button style="margin-left:17%;" type="button" id="btn_simpan" class="btn btn-danger" ><i class="fa fa-save"></i>	Simpan</button>	
															<button style="margin-left:1%;" type="button" id="btn_batal" class="btn btn-danger" ><i class="fa fa-mail-reply"></i>	Batal</button>		
														</div>
													</div>
												</div>
												<div class="col-sm-5">													
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">[+Embls Rp </label>	
															<div class="col-lg-3" >
																<input type="text" class="form-control" style="margin-left:20px" name="Embls" id="Embls" value="0" disabled=false>
															</div>	
															<label for="inputEmail3" style="margin-left:5px;" class="col-sm-2 control-label">,-]</label>	
														</div>	
														<div class="row">
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Sub Total : Rp </label>	
															<div class="col-lg-3" >
																<input type="text" class="form-control" style="margin-left:20px" name="SubTotal" id="SubTotal" value="0" disabled=false>
															</div>
															<label for="inputEmail3" style="margin-left:5px;" class="col-sm-2 control-label">,-</label>	
														</div>		
														<div class="row">
															<label for="inputEmail3" style="width:75%;" class="col-sm-2 control-label">----------------------------------------------------------------</label>																
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Total :</label>
															<label for="inputEmail3" style="margin-left:30px;width:150px;" id="Total" class="col-sm-2 control-label">Rp 0,-</label>
														</div>
															*Termasuk Pembulatan (jika diaktifkan)
													</div>
													<div class="form-group">
														<div class="row">																
															<button type="button" id="btn_harga" class="btn btn-primary" style="margin-left:36%;"><i class="fa fa-search"></i>	Harga</button>
														</div>
													</div>
													
												</div>
											</div>
												
										</div>									
																															
									</div>
								</div>					
																							
								<div class="tab-pane" id="tab_2" style="position: relative; height: 800px;">
									
									<div class="box-body">					
										<div class="row">
											<div class="form-group">
												<div class="col-sm-12">
														<div class="box">
															<div class="box-header with-border">
																<h3 class="box-title">Form Setting</h3>
																	<div class="box-tools pull-right">
																		<span class="label label-primary"></span>
																	</div>
															</div>														
														</div>	
													<div class="row">
														<div class="box-body">
															<div class="col-lg-7" >
																<label><input type="checkbox" name="cek_aktifsetting" id="cek_aktifsetting" value="cek_aktifsetting">Aktifkan setting dibawah ini:</label>
															</div>
														</div>
													</div>
													<div class="row">													
														<button type="button" style="margin-left:40px;" id="btn_simpansetting" class="btn btn-primary" disabled="false" ><i class="fa fa-save"></i>	Simpan</button>
													</div>
													
													<div class="row">
														<div class="col-sm-6">
															<div class="box-body">
																<div class="form-group">
																	<div class="row">
																		<div class="col-lg-10" >
																			<label><input type="checkbox" name="cek_laba" id="cek_laba" value="cek_laba" disabled="false">Laba untuk Resep / Beli Bebas Otomatis</label>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-10" >
																			<label><input type="checkbox" name="cek_barangnol" id="cek_barangnol" value="cek_barangnol" disabled="false">Barang Nol / Kurang, tidak bisa Transaksi</label>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-10" >
																			<label><input type="checkbox" name="cek_px" id="cek_px" value="cek_px" disabled="false">Px Bayar Langsung (Tanpa Buffer Billing)</label>
																		</div>
																	</div>	
																		
																</div>
															</div>
														</div>
														
														<div class="col-sm-6">
															<div class="box-body">
																<div class="form-group">
																	<div class="row">
																		<div class="col-lg-7" >
																			<label><input type="checkbox" name="cek_pembulatanuang" id="cek_pembulatanuang" checked value="cek_pembulatanuang" disabled="false">Pembulatan Uang</label>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-lg-7" >
																			<label><input type="checkbox" name="cek_kwitansi" id="cek_kwitansi" value="cek_kwitansi" disabled="false">Cek Kwitansi</label>
																		</div>
																	</div>
																	
																	<div class="row">
																		<div class="col-lg-7" >
																			<label><input type="checkbox" name="cek_cetak" id="cek_cetak" checked value="cek_cetak" disabled="false">Cetak Nota Rincian Apotek</label>
																		</div>
																	</div>
																	
																	<div class="row">
																		<div class="col-lg-7" >
																			<label><input type="checkbox" name="cek_embalase" id="cek_embalase" checked value="cek_embalase" disabled="false">Embalase ditampilkan</label>
																		</div>
																	</div>
																							
																</div>
															</div>
														</div>
														
													</div>
													
												</div>
											</div>
										</div>
									</div>	
																																	
									<div class="col-sm-6">
										<div class="box">
											<div class="box-header with-border">
												<h3 class="box-title">Setting Nota(Struck):</h3>
													<div class="box-tools pull-right">
														<span class="label label-primary"></span>
													</div>
											</div>														
										</div>	
										
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Ukuran Struck (Lebar)</label>
												<div class="col-lg-5" >
													<select class="col-sm-2 form-control" name="combo_ukuranstruck" id="combo_ukuranstruck" style="width:100%;" disabled="false">
														<option>Roll Kecil</option>
														<option>Roll Medium</option>
														<option selected="selected">Lebar A4</option>
														<option>Lebar A5</option>
													</select>
												</div>															
										</div>
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Ukuran Title (Nama Apotik)</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control" name="combo_ukurantitle" id="combo_ukurantitle" style="width:100%;" disabled="false">
														<option>5</option><option>6</option><option>7</option><option>8</option><option>9</option>
														<option selected="selected">10</option><option>11</option><option>12</option><option>13</option><option>14</option>
														<option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
													</select>
												</div>															
										</div>
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Ukuran Header / Footer</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control" name="combo_ukuranheader" id="combo_ukuranheader" style="width:100%;" disabled="false">
														<option>5</option><option>6</option><option>7</option><option selected="selected">8</option><option>9</option>
														<option>10</option><option>11</option><option>12</option><option>13</option><option>14</option>
														<option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
													</select>
												</div>															
										</div>
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Ukuran Detail / Header Table</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control" name="combo_ukurandetail" id="combo_ukurandetail" style="width:100%;" disabled="false">
														<option>5</option><option>6</option><option>7</option><option selected="selected">8</option><option>9</option>
														<option>10</option><option>11</option><option>12</option><option>13</option><option>14</option>
														<option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
													</select>
												</div>															
										</div>
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Ukuran Left Margin</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control" name="combo_ukuranleft" id="combo_ukuranleft" style="width:100%;" disabled="false">
														<option>5</option><option>6</option><option>7</option><option>8</option><option>9</option>
														<option>10</option><option>11</option><option>12</option><option>13</option><option>14</option>
														<option>15</option><option>16</option><option>17</option><option>18</option><option>19</option>
														<option selected="selected">20</option><option>21</option><option>22</option><option>23</option>
														<option>24</option><option>25</option><option>26</option><option>27</option><option>28</option>
														<option>29</option><option>30</option><option>31</option><option>32</option><option>33</option>
														<option>34</option><option>35</option><option>36</option><option>37</option><option>38</option>
														<option>39</option><option>40</option><option>41</option><option>42</option><option>43</option>
														<option>44</option><option>45</option><option>46</option><option>47</option><option>48</option>
														<option>49</option><option>50</option><option>51</option><option>52</option><option>53</option>
														<option>54</option><option>55</option><option>56</option><option>57</option><option>58</option>
														<option>59</option>	<option>60</option><option>61</option><option>62</option><option>63</option>
														<option>64</option><option>65</option><option>66</option><option>67</option><option>68</option>
														<option>69</option><option>70</option><option>71</option><option>72</option><option>73</option>
														<option>74</option><option>75</option><option>76</option><option>77</option><option>78</option>
														<option>79</option><option>80</option>
													</select>
											</div>															
										</div>
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Koreksi Lebar (Manual)</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control" name="combo_koreksilebar" id="combo_koreksilebar" style="width:100%;" disabled="false">
														<option>-100</option><option>-99</option><option>-98</option><option>-97</option><option>-96</option>
														<option>-95</option><option>-94</option><option>-93</option><option>-92</option><option>-91</option>
														<option>-90</option><option>-89</option><option>-88</option><option>-87</option><option>-86</option>
														<option>-85</option><option>-84</option><option>-83</option><option>-82</option><option>-81</option>
														<option>-80</option><option>-79</option><option>-78</option><option>-77</option><option>-76</option>
														<option>-75</option><option>-74</option><option>-73</option><option>-72</option><option>-71</option>
														<option>-70</option><option>-69</option><option>-68</option><option>-67</option><option>-66</option>
														<option>-65</option><option>-64</option><option>-63</option><option>-62</option><option>-61</option>
														<option>-60</option><option>-59</option><option>-58</option><option>-57</option><option>-56</option>
														<option>-55</option><option>-54</option><option>-53</option><option>-52</option><option>-51</option>
														<option>-50</option><option>-49</option><option>-48</option><option>-47</option><option>-46</option>
														<option>-45</option><option>-44</option><option>-43</option><option>-42</option><option>-41</option>
														<option>-40</option><option>-39</option><option>-38</option><option>-37</option><option>-36</option>
														<option>-35</option><option>-34</option><option>-33</option><option>-32</option><option>-31</option>
														<option>-30</option><option>-29</option><option>-28</option><option>-27</option><option>-26</option>
														<option>-25</option><option>-24</option><option>-23</option><option>-22</option><option>-21</option>
														<option>-20</option><option>-19</option><option>-18</option><option>-17</option><option>-16</option>
														<option>-15</option><option>-14</option><option>-13</option><option>-12</option><option>-11</option>
														<option>-10</option><option>-9</option><option>-8</option><option>-7</option><option>-6</option>
														<option>-5</option><option>-4</option><option>-3</option><option>-2</option><option>-1</option><option>0</option>
														<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
														<option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
														<option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
														<option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
														<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
														<option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
														<option>31</option><option>32</option><option>33</option><option>34</option><option>35</option>
														<option>36</option><option>37</option><option>38</option><option>39</option><option>40</option>
														<option>41</option><option>42</option><option>43</option><option>44</option><option>45</option>
														<option>46</option><option>47</option><option>48</option><option>49</option><option>50</option>
														<option>51</option><option>52</option><option>53</option><option>54</option><option>55</option>
														<option>56</option><option>57</option><option>58</option><option>59</option><option>60</option>
														<option>61</option><option>62</option><option>63</option><option>64</option><option>65</option>
														<option>66</option><option>67</option><option>68</option><option>69</option><option>70</option>
														<option>71</option><option>72</option><option>73</option><option>74</option><option>75</option>
														<option>76</option><option>77</option><option>78</option><option>79</option><option>80</option>
														<option>81</option><option>82</option><option>83</option><option>84</option><option>85</option>
														<option>86</option><option>87</option><option>88</option><option>89</option><option>80</option>
														<option>91</option><option>92</option><option>93</option><option>94</option><option>95</option>
														<option>96</option><option>97</option><option selected="selected">98</option><option>99</option><option>100</option>
													</select>
												</div>															
										</div>
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Koreksi Tinggi (Manual)</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control" name="combo_koreksitinggi" id="combo_koreksitinggi" style="width:100%;" disabled="false">									
														<option>-100</option><option>-99</option><option>-98</option><option>-97</option><option>-96</option>
														<option>-95</option><option>-94</option><option>-93</option><option>-92</option><option>-91</option>
														<option>-90</option><option>-89</option><option>-88</option><option>-87</option><option>-86</option>
														<option>-85</option><option>-84</option><option>-83</option><option>-82</option><option>-81</option>
														<option>-80</option><option>-79</option><option>-78</option><option>-77</option><option>-76</option>
														<option>-75</option><option>-74</option><option>-73</option><option>-72</option><option>-71</option>
														<option>-70</option><option>-69</option><option>-68</option><option>-67</option><option>-66</option>
														<option>-65</option><option>-64</option><option>-63</option><option>-62</option><option>-61</option>
														<option>-60</option><option>-59</option><option selected="selected">-58</option><option>-57</option><option>-56</option>
														<option>-55</option><option>-54</option><option>-53</option><option>-52</option><option>-51</option>
														<option>-50</option><option>-49</option><option>-48</option><option>-47</option><option>-46</option>
														<option>-45</option><option>-44</option><option>-43</option><option>-42</option><option>-41</option>
														<option>-40</option><option>-39</option><option>-38</option><option>-37</option><option>-36</option>
														<option>-35</option><option>-34</option><option>-33</option><option>-32</option><option>-31</option>
														<option>-30</option><option>-29</option><option>-28</option><option>-27</option><option>-26</option>
														<option>-25</option><option>-24</option><option>-23</option><option>-22</option><option>-21</option>
														<option>-20</option><option>-19</option><option>-18</option><option>-17</option><option>-16</option>
														<option>-15</option><option>-14</option><option>-13</option><option>-12</option><option>-11</option>
														<option>-10</option><option>-9</option><option>-8</option><option>-7</option><option>-6</option>
														<option>-5</option><option>-4</option><option>-3</option><option>-2</option><option>-1</option><option>0</option>
														<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
														<option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
														<option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
														<option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
														<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
														<option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
														<option>31</option><option>32</option><option>33</option><option>34</option><option>35</option>
														<option>36</option><option>37</option><option>38</option><option>39</option><option>40</option>
														<option>41</option><option>42</option><option>43</option><option>44</option><option>45</option>
														<option>46</option><option>47</option><option>48</option><option>49</option><option>50</option>
														<option>51</option><option>52</option><option>53</option><option>54</option><option>55</option>
														<option>56</option><option>57</option><option>58</option><option>59</option><option>60</option>
														<option>61</option><option>62</option><option>63</option><option>64</option><option>65</option>
														<option>66</option><option>67</option><option>68</option><option>69</option><option>70</option>
														<option>71</option><option>72</option><option>73</option><option>74</option><option>75</option>
														<option>76</option><option>77</option><option>78</option><option>79</option><option>80</option>
														<option>81</option><option>82</option><option>83</option><option>84</option><option>85</option>
														<option>86</option><option>87</option><option>88</option><option>89</option><option>80</option>
														<option>91</option><option>92</option><option>93</option><option>94</option><option>95</option>
														<option>96</option><option>97</option><option>98</option><option>99</option><option>100</option>
													</select>															
												</div>															
										</div>
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Tulisan Text Footer</label>
										</div>
										<div class="row">	
											<div class="col-lg-7" >
												<input type="text" class="form-control"  value="~ Semoga Lekas Sembuh ~" name="footer" id="footer" disabled="false">
											</div>	
										</div>
										
									</div>												
									<div class="col-sm-6">
										<div class="box">
											<div class="box-header with-border">
												<h3 class="box-title">Layout Resep:</h3>
													<div class="box-tools pull-right">
														<span class="label label-primary"></span>
													</div>
											</div>														
										</div>

										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Print Style</label>
												<div class="col-lg-5" >
													<select class="col-sm-2 form-control" name="combo_printstyle" id="combo_printstyle" style="width:100%;" disabled="false">
														<option>Staccato222 BT</option>
														<option>John Handy LET</option>
														<option>Rage Italic LET</option>
														<option>Tiranti Solid LET</option>
														<option selected="selected">Smudger LET</option>
													</select>
												</div>															
										</div>
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Ukuran Tulisan Nama Obat</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control" name="combo_ukurantulisannamaobat" id="combo_ukurantulisannamaobat" style="width:100%;" disabled="false">
														<option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
														<option>16</option><option selected="selected">17</option><option>18</option><option>19</option><option>20</option>
														<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
													</select>
												</div>															
										</div>
										<div class="row">		
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">Ukuran Tulisan Aturan Pakai</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control" name="combo_ukurantulisanaturanpakai" id="combo_ukurantulisanaturanpakai" style="width:100%;" disabled="false">
														<option>11</option><option>12</option><option>13</option><option selected="selected">14</option><option>15</option>
														<option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
														<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
													</select>														
												</div>															
										</div>
										<div class="row">
											<div class="col-lg-7" >
												<label><input type="checkbox"  name="cek_tampilkanheader" id="ttcek_tampilkanheader" checked value="cek_tampilkanheader" disabled="false">Tampilkan Header Resep</label>
											</div>
												<button type="button" id="btn_preview"  class="btn btn-danger" disabled="false"><i class="fa fa-eye"></i>	Preview</button>										
										</div>
										<div class="row">
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">ASAM MEFENAMAT 500 XX</label>
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">3DD 1 Setelah Makan</label>										
										</div>
										<div class="row">
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">AMOXICILLIN 500 MG XX</label>
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">3DD 1 Setelah Makan</label>										
										</div>
										<div class="row">
											<label for="inputEmail3" style="width:210px;" class="col-sm-2 control-label">CIMENTIDINE XX</label>
											<label for="inputEmail3" style="width:250px;" class="col-sm-2 control-label">3DD 1 15 Menit Sebelum Makan</label>										
										</div>
														
									</div>							
									
								</div>											
								
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">					
				</div><!-- /.box-header -->				
					<div class="box-body">
						<div class="form-group">						
							<div class="row">
								<label for="inputEmail3" style="margin-left:3%;width:10%;" class="col-sm-2 control-label">Pelayanan</label>
								<div class="col-lg-2" >
									<select class="col-sm-2 form-control" name="combo_layanan" id="combo_layanan" style="width:120%;">
										<option>R/ Hari Ini Belum Dilayani</option>										
										<option>R/ Hari Ini Sudah Dilayani</option>
										<option>Semua R/ Hari Ini</option>
										<option>Semua R/ Sudah Dilayani</option>
										<option>Semua R/ Belum Dilayani</option>
										<option selected="selected">Semua R/</option>
									</select>														
								</div>		
									<button type="button" style="margin-left:3%;" id="btn_refreshlayanan" class="btn btn-primary"><i class="fa fa-refresh"></i>	Refresh</button>	
							</div>	
						</div>
						<div class="form-group">	
							<div class="row">
								<div class="col-md-12">
									<table id="list_transaksi2" class="table table-bordered table-hover display">
										<thead>
											<tr>
											<th></th>
											<th>Poli</th>
											<th>No RM</th>
											<th>Pasien</th>
											<th>Jenis Kelamin</th>
											<th>Umur</th>
											<th>Dokter</th>
											<th>Tanggal</th>
											<th>Reg</th>
											<th>Perawatan</th>
											</tr>
										</thead>
									</table>												
								</div>								
							</div>
									
							
						
							
							<div class="row">
								<div class="col-lg-2" >
									<input type="text" style="margin-left:15px;" class="form-control" name="reg" id="reg" disabled="false" placeholder="">
								</div>
								<div class="col-lg-2" >
									<input type="text" style="margin-left:0px;" class="form-control" name="tanggal" id="tanggal" disabled="false" placeholder="">
								</div>
									<input type="text" style="margin-left:5px;width:297px;" class="form-control" name="dokter" id="dokter"  disabled="false" placeholder="">							
							</div>
							
							<div class="row">
								<div class="col-lg-2" >
									<input type="text" style="margin-left:15px;" class="form-control" name="rm" id="rm"  disabled="false" placeholder="">
								</div>
								<div class="col-lg-5" >
									<input type="text" style="margin-left:0px;" class="form-control" name="pasien" id="pasien"  disabled="false" placeholder="">
								</div>							
							</div>
							
							<div class="row">
								<div class="col-lg-2" >
									<input type="text" style="margin-left:15px;" class="form-control" name="jk" id="jk"  disabled="false" placeholder="">
								</div>
								<div class="col-lg-2" >
									<input type="text" style="margin-left:0px;width:150px;" class="form-control" name="umur" id="umur"  disabled="false" placeholder="">
								</div>	
									<label for="inputEmail3" style="margin-left:-50px;width:95px;" class="col-sm-2 control-label">Thn (Bln)</label>
								<div class="col-lg-6" >
									<label><input type="checkbox"  name="cek_edit" id="cek_edit" value="cek_edit">Edit</label>
									<label><input type="checkbox" style="margin-left:45px;" name="cek_turunan" id="cek_turunan" value="cek_turunan">R/ Turunan</label>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-2" >
									<input type="text" style="margin-left:15px;" class="form-control" name="perawatan" id="perawatan"  disabled="false" placeholder="">
								</div>
								<div class="col-lg-2" >
									<input type="text" style="margin-left:0px;width:150px;" class="form-control" name="poli" id="poli"  disabled="false" placeholder="">
								</div>																		
									<button type="button" style="width:60px;" id="btn_ceklis" class="btn btn-primary" disabled=false><i class="fa  fa-check"></i>	</button>
							</div>	
							
							<div class="box-body">
							<div class="row">
									<div class="col-xs-5" >
										<textarea style="margin-left:5px;" rows="6" cols="70" name="ket" id="ket" disabled=false></textarea>
									</div>
								
							</div>
							</div>
							
							<div class="box-body">
								<div class="row">
									<button type="button" style="margin-left:2%;" id="btn_Load" class="btn btn-primary"><i class="fa fa-arrow-up"></i>	Load R/</button>		
									<button type="button" id="btn_RPrint" class="btn btn-danger" disabled=false><i class="fa fa-print"></i>	R/</button>												
									<button type="button" id="btn_Etiket" class="btn btn-danger"><i class="fa fa-print"></i>	Etiket</button>											
									<button type="button" id="btn_New" class="btn btn-primary"><i class="fa fa-file-text"></i>	New</button>											
									<button type="button" id="btn_Reset" class="btn btn-danger"><i class="fa fa-refresh"></i>	Reset</button>	
								</div>
							</div>
							
						</div>	
					</div>
				
				
			</div>
		</div>
			
	</div>	

</section>


<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>

<script src="../../../assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../../assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../../assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="../../../assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../../assets/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="../../../assets/DataTables/js/dataTables.select.min.js"></script>
<script src="../../../assets/select2/dist/js/select2.js"></script>
<script src="../../../assets/Select-master/js/dataTables.select.js"></script>
<script src="../../../assets/DataTables/js/dataTables.tableTools.js"></script>
<script type="text/javascript">

	
	var dtrec;	
	
$(function () {	

	$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	$("[data-mask]").inputmask();
	
	$('#list_transaksi2').DataTable({
		paging: true, lengthChange:false , searching: true,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	
	$("#combo_perawatan1").change(function(){
		ComboPerawatan2();
	});
	function ComboPerawatan2(){
		$.ajax({  
			data:{header:$("#combo_perawatan1").val()}, 
			url: "../get_perawatan2/",
			async: false, type:'POST',
			success: function(data){ 
			$("#tampilcombo_perawatan2").html(data);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	
	$("#cek_koreksi").click(function() {	
		 if ($( "#cek_koreksi" ).prop( "checked"))	{
			$( "#koreksinota" ).prop( "disabled", false );			
			$( "#btn_koreksi" ).prop( "disabled", false );
		}else{
			$( "#koreksinota" ).prop( "disabled", true );			
			$( "#btn_koreksi" ).prop( "disabled", true );
		}		
	});
	
	$("#cek_entrytgl").click(function() {	
		 if ($( "#cek_entrytgl" ).prop( "checked"))	{
			$( "#entrytgl" ).prop( "disabled", false );	
		}else{
			$( "#entrytgl" ).prop( "disabled", true );	
		}		
	});
	
	$("#cek_harga").click(function() {	
		 if ($( "#cek_harga" ).prop( "checked"))	{
			$( "#harga" ).prop( "disabled", false );	
		}else{
			$( "#harga" ).prop( "disabled", true );	
		}		
	});
	$("#cek_edit").click(function() {	
		 if ($( "#cek_edit" ).prop( "checked"))	{
			$( "#ket" ).prop( "disabled", false );	
		}else{
			$( "#ket" ).prop( "disabled", true );	
		}		
	});
	
	$("#combo_pembayaran2").change(function () {
		if (this.value !='RESEP'){
			$( "#embalase" ).prop( "disabled", true );
		}else if (this.value !='BELI BEBAS'){
			$( "#embalase" ).prop( "disabled", false );
		}else{
			$( "#embalase" ).prop( "disabled", false );
		}
        
    });
	
	$("#cek_aktifsetting").click(function() {	
		 if ($( "#cek_aktifsetting" ).prop( "checked"))	{
			$( "#btn_simpansetting" ).prop( "disabled", false );			 
			$( "#cek_laba" ).prop( "disabled", false );
			$( "#cek_barangnol" ).prop( "disabled", false );
			$( "#cek_px" ).prop( "disabled", false );
			$( "#cek_pembulatanuang" ).prop( "disabled", false );
			$( "#cek_kwitansi" ).prop( "disabled", false );
			$( "#cek_cetak" ).prop( "disabled", false );
			$( "#cek_embalase" ).prop( "disabled", false );
			$( "#combo_ukuranstruck" ).prop( "disabled", false );
			$( "#combo_ukurantitle" ).prop( "disabled", false );
			$( "#combo_ukuranheader" ).prop( "disabled", false );
			$( "#combo_ukurandetail" ).prop( "disabled", false );
			$( "#combo_ukuranleft" ).prop( "disabled", false );
			$( "#combo_koreksilebar" ).prop( "disabled", false );
			$( "#combo_koreksitinggi" ).prop( "disabled", false );
			$( "#footer" ).prop( "disabled", false );
			$( "#combo_printstyle" ).prop( "disabled", false );
			$( "#combo_ukurantulisannamaobat" ).prop( "disabled", false );
			$( "#combo_ukurantulisanaturanpakai" ).prop( "disabled", false );
			$( "#cek_tampilkanheader" ).prop( "disabled", false );
			$( "#btn_preview" ).prop( "disabled", false );			
		}else{
			$( "#btn_simpansetting" ).prop( "disabled", true );
			$( "#cek_laba" ).prop( "disabled", true );
			$( "#cek_barangnol" ).prop( "disabled", true );
			$( "#cek_px" ).prop( "disabled", true );
			$( "#cek_pembulatanuang" ).prop( "disabled", true );
			$( "#cek_kwitansi" ).prop( "disabled", true );
			$( "#cek_cetak" ).prop( "disabled", true );
			$( "#cek_embalase" ).prop( "disabled", true );
			$( "#combo_ukuranstruck" ).prop( "disabled", true );
			$( "#combo_ukurantitle" ).prop( "disabled", true );
			$( "#combo_ukuranheader" ).prop( "disabled", true );
			$( "#combo_ukurandetail" ).prop( "disabled", true );
			$( "#combo_ukuranleft" ).prop( "disabled", true );
			$( "#combo_koreksilebar" ).prop( "disabled", true );
			$( "#combo_koreksitinggi" ).prop( "disabled", true );
			$( "#footer" ).prop( "disabled", true );
			$( "#combo_printstyle" ).prop( "disabled", true );
			$( "#combo_ukurantulisannamaobat" ).prop( "disabled", true );
			$( "#combo_ukurantulisanaturanpakai" ).prop( "disabled", true );
			$( "cek_tampilkanheader" ).prop( "disabled", true );
			$( "#btn_preview" ).prop( "disabled", true);
	}		
	});
	$('#btn_batal').click(function(){
		Clear();
		ComboPerawatan2();
	});
	function Clear(){
		$( "#noreg" ).val("");			
		$( "#norm" ).val("");
		$( "#nama" ).val("");
		$( "#combo_jenispx" ).val("==PILIH==");
		$( "#combo_pembayaran1" ).val("==PILIH==");
		$( "#combo_pembayaran2" ).val("==PILIH==");
		$( "#combo_penjamin" ).val("==PILIH==");			
		$( "#embalase" ).val("");
		$( "#koreksinota" ).val("");
		$( "#entrytgl" ).val("");
		$( "#combo_perawatan1" ).val("==PILIH==");
		$( "#combo_perawatan2" ).val("==PILIH==");
		$( "#combo_dokter" ).val("==PILIH==");			
		$("#satuan").text("[satuan]");			
		$("#stock").text("[jumlah]");
		$( "#quantity" ).val("");
		$( "#harga" ).val("0");
		$( "#diskon" ).val("");
		$( "#remark" ).val("");
		$( "#btn_simpan" ).prop( "disabled", false );
		$( "#btn_auto" ).prop( "disabled", false );
		$( "#btn_refresh" ).prop("disabled", false);
		$( "#btn_auto" ).prop("disabled", false);
		$( "#btn_newfile" ).prop("disabled", false);
		$( "#norm" ).prop("disabled", false);
		$( "#nama" ).prop("disabled", false);
		$( "#combo_jenispx" ).prop("disabled", false);
		$( "#combo_pembayaran1" ).prop("disabled", false);
		$( "#combo_pembayaran2" ).prop("disabled", false);
		iniDataTransaksi1('no');
	}
	$('#btn_New').click(function(){
		New();
	});
	function New(){		
		$( "#dokter" ).val("Nama Dokter");
		$( "#rm" ).val("No Rm");
		$( "#pasien" ).val("Nama Pasien");
		$( "#jk" ).val("Male Female");
		$( "#umur" ).val("Umur");
		$( "#ket" ).val("");
		
		$( "#dokter" ).prop( "disabled", false );
		$( "#rm" ).prop( "disabled", false );
		$( "#pasien" ).prop( "disabled", false );
		$( "#jk" ).prop( "disabled", false );
		$( "#umur" ).prop( "disabled", false );
		$( "#ket" ).prop( "disabled", false );
	}
	$('#btn_Reset').click(function(){
		Reset();
	});
	function Reset(){
		$( "#reg" ).val("");			
		$( "#tanggal" ).val("");
		$( "#dokter" ).val("");
		$( "#rm" ).val("");
		$( "#pasien" ).val("");
		$( "#jk" ).val("");
		$( "#umur" ).val("");			
		$( "#perawatan" ).val("");
		$( "#poli" ).val("");
		$( "#ket" ).val("");
		
		$( "#reg" ).prop( "disabled", true );
		$( "#tanggal" ).prop( "disabled", true );
		$( "#dokter" ).prop( "disabled", true );
		$( "#rm" ).prop( "disabled", true );
		$( "#pasien" ).prop( "disabled", true );
		$( "#jk" ).prop( "disabled", true );
		$( "#umur" ).prop( "disabled", true );
		$( "#perawatan" ).prop( "disabled", true );
		$( "#poli" ).prop( "disabled", true );
		$( "#ket" ).prop( "disabled", true );
	}
	
	
	var cari_namabarang = {
        placeholder: "Cari Nama Barang...",
        minimumInputLength: 1,
         ajax: {	
				url: "../cari_namabarang/", 
				dataType: 'json',
				type:"POST", 
				data: function (term) {return term;},
				processResults: function (data, page) { return { results: data };}
        } 
    };
	$("#combo_barang").select2(cari_namabarang);
	
	$("#combo_barang").change(function () { 
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_barang").val()}, 
			url: "../get_satuan/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#satuan").text(dt.satuan);$("#harga").val(dt.harga);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
		if ($( "#combo_perawatan1" ).val() =='RAWAT JALAN'){
			tampilStockRajal();
		}else if ($( "#combo_perawatan1" ).val() =='RAWAT INAP'){
			tampilStockRanap();
		}else{
				
		} 
	});	
	$("#combo_perawatan1").change(function(){
		if ($( "#combo_perawatan1" ).val() =='RAWAT JALAN'){
			tampilStockRajal();
		}else if ($( "#combo_perawatan1" ).val() =='RAWAT INAP'){
			tampilStockRanap();
		}else{
				
		} 
	});
	function tampilStockRajal(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_barang option:selected").text()}, 
			url: "../get_stockrajal/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#stock").text(dt.jumlah);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	function tampilStockRanap(){
    	$.ajax({  datatype: "json",
			data:{id_master:$("#combo_barang option:selected").text()}, 
			url: "../get_stockranap/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#stock").text(dt.jumlah);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#btn_refresh").click(function() {
		CariNoReg();
	});
	function CariNoReg(){
    	$.ajax({  datatype: "json",
			data:{n_reg:$('#noreg').val()},
			url: "../carinoreg/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);
			if (dt.length > 0){$('#norm').val(dt[0].cib_pasien); $('#nama').val(dt[0].nama); 
			}else{ alert('Pasien Tidak Ada, mohon masukan No Registrasi dengan benar.' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});		
	}
	
	$("#btn_auto").click(function() {
		if ($( "#norm" ).val() == ""){			
			$( "#nama" ).val("Beli Bebas / APS");				
			$( "#btn_auto" ).prop( "disabled", true );
			$.ajax({  datatype: "json",
				url: "../aoutonumber/",async: false, type:'POST',
				success: function(data){ 
				var dt=JSON.parse(data);
				$("#norm").val('HV'+dt);},
				error: function(){alert('Error Nih !!! ');}
			});		
		}else{
			$.ajax({  datatype: "json",data:{n_rm:$('#norm').val()},
			url: "../carinama/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ $('#nama').val(dt[0].namaP);
			}else{ alert('Pasien Tidak Ada, mohon masukan No RM dengan benar.' );}
			}, error: function(){alert('Error Nih !!! ');}		
			});
		}
	});
	
	$("#btn_simpan").click(function() { 
		if ($("#norm").val() == ""){
			alert("Masukan No RM");
		}else if ($("#nama").val() == ""){
			alert("Masukan Nama Pasien");
		}else if ($("#combo_jenispx option:selected").text() == "==PILIH=="){
			alert("Pilih Jenis Px ?");
		}else if ($("#combo_pembayaran1 option:selected").text() == "==PILIH=="){
			alert("Pilih jenis pembayaran ?");
		}else if ($("#combo_pembayaran2 option:selected").text() == "==PILIH=="){
			alert("Pilih kelompok pembelian apakah Resep / Beli Bebas ?");
		}else if ($("#combo_pembayaran2 option:selected").text() == "RESEP" && $("#embalase").val() == ""){
			alert("Nilai Embalase belum dimasukan, mohon ulangi");
		}else if ($("#combo_perawatan1 option:selected").text() == "==PILIH=="){
			alert("Pilih jenis perawatan apakah Rawat Jalan / Rawat Inap ?");
		}else if ($("#combo_perawatan2 option:selected").text() == "==PILIH=="){
			alert("Pilih kelompok perawatan");
		}else if ($("#combo_dokter option:selected").text() == "==PILIH=="){
			alert("Pilih nama dokter");
		}else if ($("#satuan").text() == "[satuan]"){
			alert("Nama obat belum dimasukan, mohon ulangi");
		}else if ($("#quantity").val() == ""){
			alert("Jumlah obat belum dimasukan, mohon ulangi");
		}else if ($("#harga").val() == "0"){
			alert("Harga obat belum dimasukan, mohon ulangi");
		}else {
			Simpan();
		}
		
		if ($( "#combo_perawatan1" ).val() =='Rawat Jalan'){
			UpdateStockRajal();				
		}else if ($( "#combo_perawatan1" ).val() =='Rawat Inap'){
			UpdateStockRanap();
		}else{
			
		} 			  
	});
	function Simpan(){
		$.ajax({  datatype: "json",data:{
					norm :$('#norm').val(),	
					combo_barang :$('#combo_barang option:selected').text(),
					harga : $('#harga').val(),
					qty : $('#quantity').val(),
					qty2 : $('#embalase').val(),						
					nama :$('#nama').val(),
					combo_dokter :$('#combo_dokter option:selected').text(),
					combo_perawatan1 :$('#combo_perawatan1 option:selected').text(),				
					combo_pembayaran2 :$('#combo_pembayaran2 option:selected').text(),
					combo_jenispx :$('#combo_jenispx option:selected').text(),				
					combo_pembayaran1 :$('#combo_pembayaran1 option:selected').text(),				
					upf :$('#reg').val(),							
					diskon :$('#diskon').val(),													
					remark :$('#remark').val()},
				url: "../simpan/",
				async: false, type:'POST',success: function(data){var dt=JSON.parse(data);
				alert('Data Transaksi sudah berhasil disimpan');
				iniDataTransaksi1();$( "#btn_simpan" ).prop("disabled", true);}, 					   
				error: function(){alert('Error Nih !!! ');}		
				});	
	}
	function UpdateStockRajal(){
		$.ajax({  datatype: "json",
				data:{combo_barang :$('#combo_barang option:selected').text(),
					  qty: parseInt($("#stock").text())-parseInt($('#quantity').val()) },
			url: "../UpdateStockRajal/",async: false, type:'POST',
			success: function(data){ var dt=JSON.parse(data);
			if (dt.length > 0){
				console.log(dt);
			}else{}
			}, error: function(){alert('Error Nih !!! ');}
		});
	}
	function UpdateStockRanap(){
    	$.ajax({  datatype: "json",
				data:{combo_barang :$('#combo_barang option:selected').text(),
					  qty:parseInt($("#stock").text())-parseInt($('#quantity').val()) },
			url: "../UpdateStockRanap/",async: false, type:'POST',
			success: function(data){ var dt=JSON.parse(data);
			if (dt.length > 0){
				console.log(dt);
			}else{}
			}, error: function(){alert('Error Nih !!! ');}
		});
	}
	
	function iniDataTransaksi1(){
    $('#list_transaksi1').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataTransaksi/", // json datasource
			type: "post",  // method  , by default get
			data:{n_rm:$('#norm').val()},
			error: function(){  // error handling
				$(".list_transaksi1-error").html("");
				$("#list_transaksi1").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_transaksi1_processing").css("display","none");
							
			}
		}
	});		
	}
										
		ListLayanan();
	$("#btn_refreshlayanan").click(function(){
		ListLayanan();
	});
	$("#combo_layanan").change(function () {       
		ListLayanan();      
    });
	function ListLayanan(){
    $('#list_transaksi2').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:true, ordering:false, paging:true, pagelenght:10, searchAble:true,
		"ajax":{
			url :"../DataLayanan/", // json datasource
			type: "post",  // method  , by default get
			data:{ layanan:$("#combo_layanan").val()},
			error: function(){  // error handling
				$(".list_transaksi2-error").html("");
				$("#list_transaksi2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_transaksi2_processing").css("display","none");
							
			}
		}
	});		
	}	
	$('#list_transaksi2').click(function() { 
		dtrec = $('#list_transaksi2').DataTable().row('.selected').data();
		$("#noreg").val(dtrec[8]);
		$("#combo_perawatan1").val(dtrec[9]);
		$("#combo_dokter").val(dtrec[6]);
		$("#reg").val(dtrec[8]);
		$("#tanggal").val(dtrec[7]);
		$("#dokter").val(dtrec[6]);
		$("#rm").val(dtrec[2]);
		$("#pasien").val(dtrec[3]);
		$("#jk").val(dtrec[4]);
		$("#umur").val(dtrec[5]);
		$("#perawatan").val(dtrec[9]);
		$("#poli").val(dtrec[1]);
		$("#btn_ceklis").prop("disabled", false);		
		$("#btn_RPrint").prop("disabled", false);
		CariKet();
		
    });
	function CariKet(){
	$.ajax({  datatype: "json",
					data:{no_reg:dtrec[8]},
			url: "../cariket/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ $('#ket').val(dt[0].ketresep);
			}else{ alert('Pasien Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#btn_ceklis").click(function() {
		if (confirm("Resep telah dilayani, Anda yakin akan menutup resep "+ dtrec[8]) == true) {
			
        $.ajax({  datatype: "json",data:{ no_reg : dtrec[8] },
			url: "../updateresep/",async: false, type:'POST',
					success: function(data){ var dt=JSON.parse(data);
				if (dt.length > 0){ 
					console.log(dt);
				}else{ alert("Resep Telah Ditutup");}dataSemuaBelumDilayani();
				}, error: function(){alert('Error Nih !!! ');}
		});			
		
		} 
		
	});
	$(document).ready(function(){
		$("#embalase").keyup(function(){
			var data=$("#embalase").val()*3000;
			$("#Embls").val(data);
			var total= parseInt($("#Embls").val())+parseInt($('#SubTotal').val())
			$("#Total").text('Rp	'+total+',-');
		});
	});
	$(document).ready(function(){
		$("#quantity").keyup(function(){
			
			var data=($("#harga").val()*$("#quantity").val()-($("#harga").val()*$("#quantity").val()*$("#diskon").val()/100));
			$("#SubTotal").val(data);
			var total= parseInt($("#Embls").val())+parseInt($('#SubTotal').val())
			$("#Total").text('Rp	'+total+',-');
		});
	});
	$(document).ready(function(){
		$("#diskon").keyup(function(){
			
			var data=($("#harga").val()*$("#quantity").val()-($("#harga").val()*$("#quantity").val()*$("#diskon").val()/100));
			$("#SubTotal").val(data);
			var total= parseInt($("#Embls").val())+parseInt($('#SubTotal').val())
			$("#Total").text('Rp	'+total+',-');
		});
	});
		
	$("#btn_harga").click(function() {	
	
	});
	
	$("#btn_Load").click(function(){
		CariNoReg();
		$("#combo_pembayaran1").val("CASH");
		$("#combo_pembayaran2").val("RESEP");
		$("#embalase").prop("disabled",false);		
		
	});	
	
	$("#btn_RPrint").click(function() {		
		if ($( "#combo_layanan" ).val() =='R/ Hari Ini Belum Dilayani'){
			print1();
		}else if ($( "#combo_layanan" ).val() =='R/ Hari Ini Sudah Dilayani'){
			print2();
		}else if ($( "#combo_layanan" ).val() =='Semua R/ Hari Ini'){
			print3();
		}else if ($( "#combo_layanan" ).val() =='Semua R/ Sudah Dilayani'){			
			print4();
		}else if ($( "#combo_layanan" ).val() =='Semua R/ Belum Dilayani'){			
			print5();
		}else if ($( "#combo_layanan" ).val() =='Semua R/'){			
			print6();
		}else{
			
		}
	});
	function print1(){		
		var win = "../../../assets/jasper/reports/farmasi/transaksi/HariIniBelumDilayani.php?namanoreg="+dtrec[3]+"";
		window.open(win); 
	}		
	function print2(){		
		var win = "../../../assets/jasper/reports/farmasi/transaksi/HariIniSudahDilayani.php?namanoreg="+dtrec[3]+"";
		window.open(win); 	 
	}
	function print3(){
		var win = "../../../assets/jasper/reports/farmasi/transaksi/SemuaRHariIni.php?namanoreg="+dtrec[3]+"";
		window.open(win); 		 
	}
	function print4(){	
		var win = "../../../assets/jasper/reports/farmasi/transaksi/SemuaSudahDilayani.php?namanoreg="+dtrec[3]+"";
		window.open(win); 	 
	}		
	function print5(){	
		var win = "../../../assets/jasper/reports/farmasi/transaksi/SemuaBelumDilayani.php?namanoreg="+dtrec[3]+"";
		window.open(win); 	 
	}
	function print6(){	
		var win = "../../../assets/jasper/reports/farmasi/transaksi/SemuaR.php?namanoreg="+dtrec[3]+"";
		window.open(win); 	 
	}
	
	
});	



</script>







