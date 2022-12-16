
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
    <main class="d-flex flex-nowrap col-2 sidebar-sticky">
      <div class="flex-shrink-0 p-3 bg-white border-end border-2 shadow-sm" style="width:230px;height:1000px">
        <ul class="list-unstyled ps-0">
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            게시글 관리
            </button>
            <div class="collapse show" id="home-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="lotteworld_amount.php" class="link-dark d-inline-flex text-decoration-none rounded">가격정보</a></li>
                <li><a href="lotteworld_sale.php" class="link-dark d-inline-flex text-decoration-none rounded">할인혜택</a></li>
                <li><a href="lotteworld_notice.php" class="link-dark d-inline-flex text-decoration-none rounded">공지사항</a></li>
                <li><a href="lotteworld_peraid.php" class="link-dark d-inline-flex text-decoration-none rounded">이벤트 정보</a></li>
                <li><a href="lotteworld_carousel.php" class="link-dark d-inline-flex text-decoration-none rounded">캐러셀 관리</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
              예약 관리
            </button>
            <div class="collapse" id="dashboard-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="../reserve/lotteworld_admin_reserve.php" class="link-dark d-inline-flex text-decoration-none rounded">예매 내역</a></li>
                <li><a href="../reserve/lotteworld_reserve_chart.php" class="link-dark d-inline-flex text-decoration-none rounded">Weekly</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
              회원관리
            </button>
            <div class="collapse" id="orders-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="../user_dir/lotteworld_userlist.php" class="link-dark d-inline-flex text-decoration-none rounded">회원 리스트</a></li>
                <li><a href="../user_dir/lotteworld_adminplus.php" class="link-dark d-inline-flex text-decoration-none rounded">관리자 권한부여</a></li>
                <!-- <li><a href="../user_dir/lotteworld_" class="link-dark d-inline-flex text-decoration-none rounded">타임라인</a></li> -->
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
              FAQs
            </button>
            <div class="collapse" id="account-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="../faqs/lotteworld_faq_admin.php" class="link-dark d-inline-flex text-decoration-none rounded">FAQ 리스트</a></li>
                <li><a href="../faqs/lotteworld_qna_admin.php" class="link-dark d-inline-flex text-decoration-none rounded">QnA 내역</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </main>
    <script src="sidebars.js"></script>



