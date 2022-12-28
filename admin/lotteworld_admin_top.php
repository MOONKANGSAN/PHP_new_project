<head>
    <link rel="canonical" href="https://getbootstrap.kr/docs/5.2/examples/sidebars/">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <meta name="theme-color" content="#712cf9">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="sidebars.css" rel="stylesheet">
</head>
  <header class="px-3 bg-primary align-self-center" style="height:50px">
    <div class="d-flex flex-wrap justify-content-start align-items-center py-1">
      <p class="col-md-2 mb-0 text-white border-white" onclick="location.href='lotteworld_admin_index.php'">LOTTEWORLD | ADMIN</p>
      <ul class="nav col-5 justify-content-start">
        <li class="nav-item"><a href="dashboard/lotteworld_peraid.php" class="nav-link px-2 text-white">이벤트 내역</a></li>
        <li class="nav-item"><a href="dashboard/lotteworld_notice.php" class="nav-link px-2 text-white">공지사항</a></li>
        <li class="nav-item"><a href="reserve/lotteworld_admin_reserve.php" class="nav-link px-2 text-white">예매내역</a></li>
        <li class="nav-item"><a href="faqs/lotteworld_faq_admin.php" class="nav-link px-2 text-white">FAQs</a></li>
      </ul>
      <ul class="nav col-5 justify-content-end">
        <li class="nav-item"><a href="../lotteworld_main.php" class="nav-link px-2 text-white">메인페이지</a></li>
        <li class="nav-item"><a href="../../phpmyadmin/" class="nav-link px-2 text-white">DB조회</a></li>
      </ul>
    </div>
</header>


  




