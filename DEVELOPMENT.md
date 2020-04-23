## 开发
当前开发原则：尽量不动后端文件，前端配合后端。

### 发帖
* 对应文件：`controller/addAction.php` - `view/create.html`
* 接口：帖子标题 `bbs_title` 内容 `bbs_content`，使用 POST。
* TODO：需要测试。

### 登录
* 对应文件：`controller/loginAction.php` - `view/login.html`
* 接口：用户账户 `account` 密码 `psword`，使用 POST。
* TODO：需要测试。

### 注册
* 对应文件：`controller/regAction.php` - `view/register.html`
* 接口：用户账户 `account` 昵称 `nickname` 密码 `psword`，使用 POST。
* TODO：后端恢复密码校验部分。需要测试。

### 首页
* 对应文件：`view/index.html`
* TODO：无帖子分类功能。

### 顶栏
* 对应文件：`view/public/headnav.html`
* TODO：未建立搜索页。

### 所有帖子
* 对应文件：`controller/listAction.php` - `view/posts.html`
* 接口：用户账户 `account` 昵称 `nickname` 密码 `psword`，使用 POST。
* TODO：需要测试。

---

### 数据表

* 帖子 bbsTable：(null,'{$userList['uid']}','{$bbs_title}','{$bbs_content}','{$add_time}',1,0,0)
* 用户 userTable：(null,'{$nickname}','static/img/avatar-max-img.png','{$account}','{$psword}','{$add_time}',1,0)
* 评论 comTable：(null,'{$bbs_id}','{$userList['uid']}','{$content}','{$add_time}')
