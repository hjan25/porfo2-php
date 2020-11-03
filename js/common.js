(function($){

    $('#wrap').on('click', '.menu01 a, .menu02 a, .menu03 a, .menu05 a, .cont-tit .prev a', function(){
        var url = this.href;
        $('#container > #content').remove();
        $('#container').load(url+' #content');
        return false;
    });

    $('#container').on('click', '.tour-list ul a', function(){
        var url = this.href;
        $('#container > #content').remove();
        $('#container').load(url+' #content');
        return false;
    });

    // 햄버거 버튼 클릭하면 네비박스 열기
    $('#open-gnb a').on('click', function(){
        $('#nav-wrap').css({ display: 'block'});
        $('#nav-wrap #nav').stop().animate({right : '0px'}, 500);
        return false;
    });
    // 햄버거 버튼 클릭하면 네비박스 닫기
    $('#close-gnb a').on('click', function(){
        $('#nav-wrap #nav').stop().animate({right : '-274px'}, 500, function(){
            $('#nav-wrap').css({ display: 'none'});
        });
        return false;
    });

    // 네비박스 메뉴, 로그인, 회원가입 버튼 클릭
    $('#nav-wrap #nav ul a, .member .join-btn a').on('click', function(){
        var url = this.href;
        $('#container > #content').remove();
        $('#container').load(url+' #content');
        $('#nav-wrap #nav').stop().animate({right : '-274px'}, 500, function(){
            $('#nav-wrap').css({ display: 'none'});
        });
        return false;
    });

    // ajax; 투어리스트 불러오기
    var useData;
    $.ajax({
        type: 'GET',
        url: 'data/citytour.json',
        timeout: 2000,
        beforeSend: function(xhr){
            if (xhr.overrideMimeType) {
                xhr.overrideMimeType('application/json');
            }
        },
        success: function(data){
            useData = data;
        },
        error: function(erMes){
            alert(erMes.status + ' 오류발생');
        }
    });

    // 각 투어명에 맞는 데이터 추출하기
    $('#container').on('click', '.citytour-content .tour-list a', function(){
        var url = this.href;
        var tour = $(this).attr('class');
        $('#container > #content').remove();
        $('#container').load(url+' #content', function(){
            var newContent = '';
            for ( var i in useData[tour]) {
                newContent += `<li><div class="img"><img src="${useData[tour][i].photo}" alt="${useData[tour][i].title} 사진"></div>`;
                newContent += `<div><strong>${useData[tour][i].title}</strong>`;
                newContent += `<p>주소 : ${useData[tour][i].address}</p>`;
                newContent += `<p>${useData[tour][i].detail}</p></div></li>`;
            }
            $('#content .tour-place-list').html(`<ul>${newContent}</ul>`)
        });
        return false;
    });

    // ajax; 탑승장소 불러오기
    var busData;
    $.ajax({
        type: 'GET',
        url: 'data/bustop.json',
        timeout: 2000,
        beforeSend: function(xhr){
            if(xhr.overrideMimeType) {
                xhr.overrideMimeType('application/json');
            }
        },
        success: function(data2){
            busData = data2.busstop;
        },
        error: function(erMes2){
            alert(erMes2.status + ' 오류 발생');
        }
    });

    // 탑승장소 클릭하면 받은 데이터로 리스트 만들기
    $('#wrap').on('click', '.main-content .menu04 a', function(){
        var url = this.href;
        $('#container > #content').remove();
        $('#container').load(url+' #content', function(){
            var busList = "";
            for ( var i in busData) {
                busList += `<li><h3>${busData[i].name}</h3>`;
                busList += `<h4>${busData[i].place}</h4>`;
                busList += `<p>주소 : ${busData[i].address}</p>`;
                busList += `<strong>주차장 이용</strong><p>${busData[i].parking}</p>`;
                busList += `<iframe src="${busData[i].url}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></li>`;
            }
            $('#content #map-wrap').html(`<ul>${busList}</ul>`)
        });
        return false;
    })

    // 검색버튼 클릭하면 검색창 열리기
    $('#header .search-icon a').on('click', function(){
        $('#header .search-box').addClass('on');
        return false;
    });

    // 검색박스 안 닫기 버튼 클릭하면 전체 검색 박스 닫히기
    $('#header .search-box-close a').on('click', function(){
        $(this).parents('.search-box').removeClass('on');
        return false;
    });

    // 푸터 이용약관 등 클릭
    $('#footer .privacy a').on('click', function(){
        var url = this.href;
        $('#container > #content').remove();
        $('#container').load(url+' #content');
        return false;
    });

    // 푸터 로고클릭 시 회사 정보 슬라이드 다운
    $('#footer .footer-logo a').on('click', function(){
        $(this).find('i').toggleClass('act');
        $('#footer .company-info').stop().slideToggle(300);
        return false;
    });

    // goTop버튼
    var sct = 0;
    var winHeight = $(window).height();
    $(window).scroll(function(){
        sct = $(this).scrollTop();
        if ( sct >= winHeight/2 ) {
            $('.goTop').addClass('on');
        } else {
            $('.goTop').removeClass('on');
        }
    });
    $('.goTop').on('click', function(e){
        e.preventDefault();
        $('body, html').stop().animate({
            scrollTop: 0
        }, 500 ,'linear');
    });

    // 이용약관 구역
    $('#container').on('click', '#tos-wrap .s-tit', function(){
        $(this).next('.s-con').toggleClass('on');
        if ($(this).siblings('.s-tit').next('.s-con').hasClass('on')) {
            $(this).siblings('.s-tit').next('.s-con').removeClass('on')
        }
    });
    
})(jQuery)