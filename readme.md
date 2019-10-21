# 19.9.30

### 이슈사항
DBmigration 시도중
리눅스 서버에 mariadb를 설치하고 mysql -h 호스트명@아이피주소 -u 유저ID -p로 접속을 시도했으나 unknown serverhost라는 결과가 나오고 있음.

### 학습내용
linux서버에 대한 전체적인 학습

### 지적사항 보완

* IP다음 경로 없애기

완료

* yum repository 이해하기

rpm의 보완 패키지 설치 도구로써 의존성이 있는 패키지들을 자동으로 설치해준다. 의존성이 있는 패키지에 대해 yum명령어를 실행하면 의존 패키지를 자동으로 설치해 준다. rpm은 설치하려는 rpm파일이 DVD에 있거나 인터넷에서 미리 다운로드 후 설치해야 한다. 하지만 YUM은 CentOS가 제공하는 rpm 파일 저장소(repository)에 설치할 패키지 파일과 의존 패키지들을 모두 설치한다. 저장소의 URL은 /etc/yum.repos.d/에 저장해둔다. 인터넷에서 설치하기 때문에 인터넷 연결이 필수적이다.

* 서비스 상시가동 시키기

CentOS6까지는 chkconfig명령으로 자동 부팅 여부를 설정할 수 있었지만 Ubuntu 16, CentOS7부터는 systemctl enable명령을 사용하면 된다.

# 19.10.1

### 이슈사항

* index.php없애기

실패

### 학습내용

* 비로그인 추천기능, 세션활용

### 보완점

* DBmigration

완료, apm을 최신버전으로 바꾸고 포트변경.

#### 로컬서버
php 7.1

mariadb 10.4.6

# 19.10.2

### 보완사항
* index.php없애기
완료. scp명령을 쓸 때 히든파일이 옮겨지지 않아 .htaccess를 따로 만들었고 httpd.conf 파일을 수정할 떄 "var/www/html" doumentroot가 따로 있어서 그냥 documentroot의 설정을 변경해도 index.php가 사라지지 않았음.
centos의 httpd.conf 경로는 etc/httpd/conf
apache 2.4.33

#### 원격 서버
php 5.4.16

mariadb 5.5.64

apache 2.4.6

#### 변경
php 7.1.32

mariadb 10.4.8

# 19.10.8

### 이슈사항

* table doesn't exist in engine
innodb엔진인 테이블을 원격서버로 옮겼으나 테이블의 engine이 NULL로 바뀌고 어떠한 명령어도 되지 않음.

### 카테고리 세분화
category

ㄴ subcategory

#### category (ㄴ subcategory)
stay

ㄴ motel

ㄴ hotel

ㄴ guest house

ㄴ etc

cafe

ㄴ normal

ㄴ abnormal

ㄴ etc

foot

ㄴ meal

ㄴ bread

ㄴ etc

attraction

ㄴ cultural heritage

ㄴ beach

category

# 19.10.12

### 학습사항
홈페이지의 초안 제작


### 보완사항

* table doesn't exist in engine

근본적인 해결은 하지 못하고 dump파일을 만들어 옮기고 있음.

# 19.10.14

### 학습사항
* 페이지에 지도기능 추가(카카오 API)
* jquery로 스크립트 처리 추가
* db 테이블 추가
	* 지도기능을 위한 x, y좌표
	* 여행자 게시판을 위한 board테이블
	* board의 각 코스를 저장할 course테이블


### 이슈사항
* centos서버에 옮긴 php프로젝트들이 전부 404error를 나타냄. 
보일러플레이트를 옮기고 실행하면 잘 실행되지만  내가만든 프로젝트를 옮기니 404error만 나오고 있어 로컬호스트에서만 작업중. 


# 19.10.15

### 학습사항

* 기존의 데이터 시각화를 php에서 자바스크립트로 변경

함수 구현 시 자바스크립트로 표현하는것이 나아 현재 '지도 보기'페이지만 변경

* '지도 보기'페이지 초안 완성

카테고리별 분류 하여 보기, 클릭시 위치 표시기능. 카카오 지도 API이용.


### 이슈사항

* centos서버에 옮긴 php프로젝트들이 전부 404error를 나타냄. 

보일러플레이트를 옮기고 실행하면 잘 실행되지만  내가만든 프로젝트를 옮기니 404error만 나오고 있어 로컬호스트에서만 작업중. 

### 보완사항

* kakaoapi가 유료로 전환될 수 있으니 오픈소스로도 모듈을 만들어 보기 


# 19.10.18

### 학습사항

카테고리 분류할 때 나는 버그들을 줄이기 위해 모든 spot글들을 다 로드하고 jQuery로 숨긴다음 조금씩 보여주는 식으로 구현을 했었는데, 게시글이 많아질 때 부하가 커질 것 같아 jquery로 분류하는것을 지우고 다시 카테고리별로 페이지를 다시로드하는 것으로 바꿈. 


### 이슈사항

* 원격서버로 옮긴 kakao api가 실행되지 않음. 

### 보완사항

* centos서버에 옮긴 php프로젝트들이 전부 404error를 나타냄.

대소문자 오류

# 19.10.21

### 학습사항

* 게시글에 대해서 한 세션동안 조회수를 한번만 올리기. 

session에 게시글의 id를 저장하여 세션에 해당 아이디가 있으면 조회수를 올리지 않게 구현

* 게시글 정렬기능

sort_category를 db query에 추가하여 최신순, 오래된순, 좋아요순, 조회순, 가나다순 정렬 기능 구현

* '지도로 보기'페이지 다중 마커 구현 & 현재 클릭한 스팟에 대한 썸네일 표시


### 이슈사항

* session이 db를 사용하지 않음. 

config.php를 설정해주고 session을 통해 한 세션에 한 게시글의 조회수가 1만 오를수 있게 하는 기능이 정상적으로 작동하나 db에는 저장되지 않음. 

* 랜덤 게시글 보여주기 구현. 

어떻게 최적화하여 랜덤으로 게시글을 뿌려줘야 할지.

* '지도로 보기' 페이지 지도 첫 클릭시 내용과 이미지가 로드되지 않음. 

클릭 시 해당 스팟의 제목, 좋아요 수, image를 html구문안에 넣어서 지도위에 오버레이하여야 하는데 들어가지않고 빈 화면이 로드됨.
