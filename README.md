<p align="center"> 
  <img src="https://raw.githubusercontent.com/xpressengine/plugin-external_page/master/icon.png">
 </p>

# XE3 External page Plugin

이 어플리케이션은 Xpressengine3(이하 XE3)의 플러그인입니다.

이 플러그인은 XE3에서 파일을 페이지로 만드는 기능을 제공합니다.

![License](http://img.shields.io/badge/license-GNU%20LGPL-brightgreen.svg)

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
