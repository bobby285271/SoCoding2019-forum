## 开发
当前开发原则：将功能做出来。尽可能地利用已用代码，搞不定就通通注释掉重头来。

~~由于后端部分原开发者忘记自己都写了些什么，接手者表示很无奈（强烈谴责 H 性同学）~~

### 发帖
* 对应文件：`controller/addAction.php` - `view/create.html`
* 接口：帖子标题 `bbs_title` 内容 `bbs_content`，使用 POST。

### 登录
* 对应文件：`controller/loginAction.php` - `view/login.html`
* 接口：用户账户 `account` 密码 `psword`，使用 POST。

### 注册
* 对应文件：`controller/regAction.php` - `view/register.html`
* 接口：用户账户 `account` 昵称 `nickname` 密码 `psword`，使用 POST。

### 首页
* 对应文件：`view/index.html`

### 顶栏
* 对应文件：`view/public/headnav.html`

### 查看所有帖子
* 对应文件：`controller/listAction.php` - `view/posts.html`

### 查看某一帖子
* 对应文件：`controller/detailsAction.php` - `view/view-head.html` `view/view-foot.html`

### 用户详情
* 对应文件：`controller/userinfoAction.php` `controller/userAction.php` - `view/user.html`

### 发表评论
* 对应文件：`controller/commentAction.php` - `view/view.html`

---

### 数据表

**测试账户、数据表名称都在 `function.php` 配置** ~~（因为也不知道 `config.php` 是个啥玩意，晚点把它废掉吧）~~ 

> 其它位置需要到数据表名称时使用下面给出的变量。

* 用户 `{$userTable}`： 用户昵称 nickname (text), 用户账户 account (text), 用户密码 psword (text)
* 帖子 `{$userTable}`： 主键 id (bigint, AUTO_INCREMENT), 用户账户 account (text), 文章标题 bbs_title (text), 文章内容 bbs_content (text)