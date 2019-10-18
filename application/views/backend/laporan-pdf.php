<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="icon" href="<?= site_url('images/ico.jpg') ?>" sizes="192x192">
  <title>ASDP Indonesia Ferry</title>
  <style>

    @page {
      margin: 100px 0px;
    }


    body {
      /*margin-left: 2cm;*/
      /*margin-right: 2cm;*/
      font-style: normal;
      /*background-color: black !important;*/
    }

    .ui.table.bordered {
      border: solid black 2px;
      border-collapse: collapse;
      width: 100%;
    }

    .ui.table.bordered td {
      border: solid black 1px;
      border-collapse: collapse;
      /*padding:10px;*/
    }

    .ui.table.bordered td img {
      padding: 10px;
    }

    .ui.table.bordered td.center.aligned {
      text-align : center;
    }


    header {
      position: fixed;
       top: 0px;
      left: 0px;
      right: 0px;
      height: 50px;

      /*margin-left: 2cm;*/
      /*margin-right: 2cm;*/
      text-align: center;
      line-height: 35px;
    }

    main {
      position: sticky;
      font-size : 12px;
      margin-top : -2px;
      margin-left: 1px;
      margin-right: 1px;
      border: solid black 1.5px;
      border-collapse: collapse;
      width: 100%;
    }

    main p {
      margin-left: 5px;
      margin-right: 5px;
    }


    footer {
      position: fixed;
      bottom: -60px;
      left: 0px;
      right: 0px;
      height: 50px;


      text-align: center;
      line-height: 35px;
      clear: both;
    }
    .footer .page-number:after {
      content: counter(page);
    }

    .col-6 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 50%;
    }

    .row {
      border: #c0c5c7 1px dashed;
      margin: auto;
      margin-right: 0px;
      margin-left: 0px;
      margin-top: auto;
    }
    .col-sm-4 {
        width: 33.33333333%;
    }
    .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
        float: left;
    }
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }
  </style>



</head>
<body>

  <header>

    <table class="ui table bordered">
      <tr>
        <td class="center aligned" width="30%"><img src="<?= base_url('images/logo2.png'); ?>"></td>
        <td class="center aligned" width="60%" style="vertical-align: center;"><h5>Form Laporan <?= $data['judul']; ?></h5></td>
      </tr>
      <tr>
        <td class="center aligned" colspan="2" style="vertical-align: center;"><?= $data['record']->name; ?></td>
      </tr>
    </table>
  </header>
</body>
</html>
