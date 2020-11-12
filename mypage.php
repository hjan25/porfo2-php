<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:description" content="hjan25의 포트폴리오입니다.">
    <title>시티투어 놀러화요</title>
    <link rel="shortcut icon" href="images/hwa_fav.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
    <div id="wrap">
    
    <?php
        session_start();
        if ( isset($_SESSION['userid']) ) {
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username'];
            $userphone = $_SESSION['userphone'];
            $useremail = $_SESSION['useremail'];
        } else {
            $userid = '';
        }
    ?>

        <header id="header">
            <div class="row">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo.svg"alt="놀러화요 로고">
                    </a>
                </div>
                <div id="open-gnb" class="gnb">
                    <a href="#">
                        <strong class="blind">메뉴열기</strong>
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
                <div class="search-icon">
                    <a href="#">
                        <i class="fas fa-search"></i>
                        <span class="blind">검색 아이콘</span>
                    </a>
                </div>
                <div class="search-box">
                    <form action="#" method="POST" class="search-form">
                        <fieldset>
                            <legend>검색하기</legend>
                            <input type="text" name="skeyword" id="skeyword" placeholder="검색 키워드 입력">
                            <button type="reset"><i class="fas fa-times-circle"></i></button>
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </fieldset>
                    </form>
                    <div class="search-box-close">
                        <a href="#"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                <div id="nav-wrap">
                    <nav id="nav">
                        <div class="nav-logo">
                            <img src="images/logo.svg" alt="네비박스 로고">
                        </div>
                        <div class="member">
                            <?php if (!$userid) { ?>
                                <div class="login-btn inbtn">
                                    <a href="login_form.php">로그인</a>
                                </div>
                                <div class="join-btn inbtn">
                                    <a href="join.html">회원가입</a>
                                </div>
                            <?php } else { ?>
                                <div class="welcome"><?php echo ($userid); ?>님 환영합니다.</div>
                                <div class="logout-btn inbtn">
                                    <a href="logout.php">로그아웃</a>
                                </div>
                                <div class="mypage-btn inbtn">
                                    <a href="mypage.php">마이페이지</a>
                                </div>
                            <?php } ?>
                        </div>
                        <ul class="nav-box">
                            <li><a href="tourintro.html">투어 소개</a></li>
                            <li><a href="citytourList.html">시티투어</a></li>
                            <li><a href="tourReseve.html">투어 예약</a></li>
                            <li><a href="checkReserve.html">예약 조회</a></li>
                            <li><a href="notice.html">공지사항</a></li>
                        </ul>
                        <div class="reserve-btn">
                            <a href="tel:031-123-1234">예약 및 문의 031-123-1234</a>
                        </div>
                        <div>
                            <p>평일 09:00 - 17:00 <br> (점심 12:00 - 13:00)</p>
                        </div>
                        <div id="close-gnb" class="gnb">
                            <a href="#">
                                <strong class="blind">메뉴닫기</strong>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <section id="container">
            <div id="content" class="mypage-content">
                <div class="cont-tit">
                    <div class="prev">
                        <a href="index.php"><i class="fas fa-arrow-left"></i><span class="blind">이전 페이지</span></a>
                    </div>
                    <h2>마이페이지</h2>
                </div>
                <div id="mypage-wrap">
                    <div class="user-info">
                        <i class="fas fa-user-circle"></i>
                        <p><?php echo ($username); ?></p>
                        <p><?php echo ($useremail); ?></p>
                        <p><?php echo ($userphone); ?></p>
                    </div>
                    <ul class="mypage-menu">
                        <li><a href="#"><i class="far fa-edit"></i> <p>프로필 수정</p></a></li>
                        <li><a href="#"><i class="fas fa-stamp"></i> <p>여행 스탬프</p></a></li>
                        <li><a href="#"><i class="far fa-calendar-check"></i> <p>내 예약</p></a></li>
                        <li><a href="#"><i class="far fa-comment"></i> <p>여행 리뷰</p></a></li>
                        <li><a href="#"><i class="far fa-paper-plane"></i> <p>문의하기</p></a></li>
                        <li><a href="#"><i class="fas fa-cog"></i> <p>설정</p></a></li>
                    </ul>
                </div>
            </div>
        </section>

        <footer id="footer">
            <div class="privacy">
                <a href="tos.html">이용약관</a>
                <a href="privacy.html">개인정보처리방침</a>
                <a href="rec.html">이메일무단수집거부</a>
            </div>
            <div class="footer-bottom">
                <div class="footer-logo">
                    <a href="#"><img src="images/logo_black_white.png" alt="푸터 로고"><i class="fas fa-sort-down act"></i><i class="fas fa-sort-up"></i><span class="blind">회사 정보 더 보기</span></a>
                </div>
                <div class="sns">
                    <a href="#" target="_blank"><span class="blind">인스타그램</span><i class="fab fa-instagram-square"></i></a>
                    <a href="#" target="_blank"><span class="blind">페이스북</span><i class="fab fa-facebook-square"></i></a>
                </div>
            </div>
            <div class="company-info">
                <p>Company Name : 대표 김길동</p>
                <p>주소 : 경기 화성시 땡땡동 땡땡번지</p>
                <p>사업자등록번호 : 001-01-00001</p>
                <a href="tel:031-123-1234">문의 전화 : <span>031-123-1234</span></a>
                <p>평일 09:00 - 17:00 (점심 12:00 - 13:00)</p>
                <p>이메일 : sample@sample.com</p>
            </div>
            <div class="copyright">
                <p>Copyright &copy; sample name. All rights reserved.</p>
                <p>본 페이지는 포트폴리오 용도로 제작되었습니다.</p>
            </div>
        </footer>
    </div>

    <div class="goTop">
        <a href="#">
            <i class="fas fa-caret-square-up"></i>
        </a>
        <span class="blind">맨위로</span>
    </div>

    <div id="only-mobile">
        <img src="images/logo.svg" alt="로고"  width="500px">
        <p>이 사이트는 768px 이하에서만 보입니다.</p>
    </div>


    <script src="js/common.js"></script>
    <script src="js/valid.js"></script>
</body>
</html>