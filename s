[1mdiff --git a/assets/scss/components/_hero.scss b/assets/scss/components/_hero.scss[m
[1mindex dfdc0f3..5417bbe 100644[m
[1m--- a/assets/scss/components/_hero.scss[m
[1m+++ b/assets/scss/components/_hero.scss[m
[36m@@ -53,6 +53,7 @@[m
         @extend %white-hero;[m
       }[m
 [m
[32m+[m
       .sub-title {[m
         @extend %white-hero;[m
       }[m
[1mdiff --git a/assets/scss/layout/_posts.scss b/assets/scss/layout/_posts.scss[m
[1mindex d2ec99a..a59b038 100644[m
[1m--- a/assets/scss/layout/_posts.scss[m
[1m+++ b/assets/scss/layout/_posts.scss[m
[36m@@ -1,4 +1,12 @@[m
 .entry-wrapper {[m
[31m-  width: 600px;[m
[32m+[m[32m  max-width: 600px;[m
   margin: 0 auto;[m
[32m+[m
[32m+[m[32m  p {[m
[32m+[m[32m    @include query-below($small) {[m
[32m+[m[32m      margin:0 5px;[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[41m    [m
[32m+[m[32m  }[m
 }[m
\ No newline at end of file[m
[1mdiff --git a/package.json b/package.json[m
[1mindex 6abce5a..4ba3ee4 100644[m
[1m--- a/package.json[m
[1m+++ b/package.json[m
[36m@@ -1,19 +1,22 @@[m
 {[m
[31m-	"name": "cola",[m
[31m-	"devDependencies": {[m
[31m-		"gulp": "*",[m
[31m-		"gulp-livereload": "~1.0.1",[m
[31m-		"gulp-concat": "~2.1.7",[m
[31m-		"gulp-clean": "~0.2.4",[m
[31m-		"gulp-autoprefixer": "0.0.6",[m
[31m-		"gulp-notify": "*",[m
[31m-		"gulp-exec": "~1.0.4",[m
[31m-		"gulp-zip": "~0.1.2",[m
[31m-		"gulp-replace": "~0.3.0",[m
[31m-		"gulp-csscomb": "*",[m
[31m-		"gulp-yuicompressor": "*",[m
[31m-        "gulp-ruby-sass": "~0.7.1",[m
[31m-        "gulp-sass": "1.0.0",[m
[31m-        "gulp-chmod": "*"[m
[31m-	}[m
[32m+[m[32m  "name": "cola",[m
[32m+[m[32m  "devDependencies": {[m
[32m+[m[32m    "gulp": "*",[m
[32m+[m[32m    "gulp-livereload": "~1.0.1",[m
[32m+[m[32m    "gulp-concat": "~2.1.7",[m
[32m+[m[32m    "gulp-clean": "~0.2.4",[m
[32m+[m[32m    "gulp-autoprefixer": "0.0.6",[m
[32m+[m[32m    "gulp-notify": "*",[m
[32m+[m[32m    "gulp-exec": "~1.0.4",[m
[32m+[m[32m    "gulp-zip": "~0.1.2",[m
[32m+[m[32m    "gulp-replace": "~0.3.0",[m
[32m+[m[32m    "gulp-csscomb": "*",[m
[32m+[m[32m    "gulp-yuicompressor": "*",[m
[32m+[m[32m    "gulp-ruby-sass": "~0.7.1",[m
[32m+[m[32m    "gulp-sass": "1.0.0",[m
[32m+[m[32m    "gulp-chmod": "*"[m
[32m+[m[32m  },[m
[32m+[m[32m  "dependencies": {[m
[32m+[m[32m    "gulp-install": "^0.2.0"[m
[32m+[m[32m  }[m
 }[m
warning: LF will be replaced by CRLF in package.json.
The file will have its original line endings in your working directory.
