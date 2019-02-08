
<p align="center"> 
  <img src="https://raw.githubusercontent.com/xpressengine/plugin-external_page/master/icon.png">
 </p>

# XE3 External Page Plugin
이 플러그인은 Xpressengine3(이하 XE3)의 플러그인입니다.

이 플러그인을 사용하여, 이미 만들어준 HTML 또는 PHP파일을 불러와 구성할 수 있습니다.

<p align="center"> 
  <img src="https://raw.githubusercontent.com/xpressengine/plugin-external_page/develop/extr_preview.PNG">
 </p>
 




## What can I do?

본 플러그인을 사용하여 웹 페이지를 구성하는데에 이미 만들어진 HTML을 구성하거나,
PHP를 통한 간단한 페이지를 구성할 수 있도록 도와줍니다.

설정은 다음과 같이 할 수 있습니다.
<p align="center"> 
  <img src="https://raw.githubusercontent.com/xpressengine/plugin-external_page/develop/setting.PNG">
 </p>

## Installation specification
* Minimum installation environment
   XE3, PHP 7.0 or later
* Recommended installation environment
   XE3, PHP 7.1 or later

## Caution
변수를 받아 처리하거나, 또는 XE3와 유기적인 반응을 하는 경우 파일의 절대 경로가 아닌 상대 경로를 입력해야 합니다.



# Installation
### Console
```
$ php artisan plugin:install external_page
```

### Web install
- 관리자 > 플러그인 & 업데이트 > 플러그인 목록 내에 새 플러그인 설치 버튼 클릭
- `external_page` 검색 후 설치하기

### Ftp upload
- 다음의 페이지에서 다운로드
    * https://store.xpressengine.io/plugins/external_page
    * https://github.com/xpressengine/plugin-external_page/releases
- 프로젝트의 `plugins` 디렉토리 아래 `external_page` 디렉토리명으로 압축해제
- `external_page` 디렉토리 이동 후 `composer dump` 명령 실행

# Usage
관리자 > 사이트 맵> 사이트 메뉴 편집에서 `아이템 추가` 기능으로 ExternalPage를 추가해서 사용합니다.
ExternalPage 추가는 아래 순서로 가능합니다.
1. `아이템 추가` 클릭
2. External Page Module 선택 후 하단에 `다음` 클릭
3. itemURL, Item Title 등 세부사항 입력
4. Page로 만든 파일이 존재하는 경로 입력
5. 등록

>  파일의 경로는 소스코드가 저장된 경로 이하의 절대 경로를 입력합니다
>  ex) plugins/external_page/EXAMPLE.blade.php

## License
이 플러그인은 LGPL라이선스 하에 있습니다. <https://opensource.org/licenses/LGPL-2.1>

