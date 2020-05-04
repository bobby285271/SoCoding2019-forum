## 用户模块

* 后端目录：`controller/user`
* 前端目录：`view/user`

### 注册 `register`
<!-- 对应文件：后端 `controller/regAction.php`，前端 `view/register.html`。

用户输入账户 `account` 昵称 `nickname` 密码 `passwd`，POST 到 `regAction.php`，检验数据合理性后写入数据表 `forum_user`。 -->

### 登录 `login`
<!-- 对应文件：后端 `controller/loginAction.php`，前端 `view/login.html`。

用户输入账户 `account` 密码 `passwd`，POST 到 `loginAction.php`，从数据表 `forum_user` 里寻找 `account` 所在行并验证密码是否正确，正确则设置 session。 -->

### 个人中心 `info`
<!-- 对应文件：后端 `controller/userAction.php`，前端 `view/user.html`

显示已登录用户的账户 `account`、昵称 `nickname`、发布的帖子（在查看所有帖子模块上改编即可）等信息。 -->

### 注销 `logout`
<!-- 对应文件：后端 `controller/logoutAction.php`

清理已经设置的 session。 -->
