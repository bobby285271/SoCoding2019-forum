当前开发原则：将功能做出来。尽可能地利用已用代码，搞不定就通通注释掉重头来。

~~由于后端部分原开发者忘记自己都写了些什么，接手者表示很无奈（强烈谴责 H 性同学）~~

## 用户部分

### 注册
对应文件：后端 `controller/regAction.php`，前端 `view/register.html`。

用户输入账户 `account` 昵称 `nickname` 密码 `psword`，POST 到 `regAction.php`，检验数据合理性后写入数据表 `forum_user`。

### 登录
对应文件：后端 `controller/loginAction.php`，前端 `view/login.html`。

用户输入账户 `account` 密码 `psword`，POST 到 `loginAction.php`，从数据表 `forum_user` 里寻找 `account` 所在行并验证密码是否正确，正确则设置 session。

### 用户详情
对应文件：`controller/userinfoAction.php` `controller/userAction.php` - `view/user.html`

### 发表评论
对应文件：`controller/commentAction.php` - `view/view.html`

## 帖子部分

### 发布帖子
对应文件：后端 `controller/addAction.php`，前端 `view/create.html`。

用户输入帖子标题 `bbs_title` 内容 `bbs_content`，POST 到 `addAction.php` 检验数据合理性后，连同主键 ID 一并写入数据表 `$forum_bbs`。

### 查看所有帖子
对应文件：`controller/listAction.php` - `view/posts.html`

遍历数据表 `$forum_bbs`，打印所有帖子的标题。由 `listAction.php` 负责直接打印每个帖子对应的区块，例如 `<a href="view.php?id=1111" class="list-group-item list-group-item-action">Title</a>`，其中 `1111` 是主键 ID，`Title` 是文章标题。

### 查看某一帖子和帖子的评论
对应文件（当前）：`controller/detailsAction.php` - `view/view-head.html` `view/view-mid.html`

前端视图由多个文件组装，第一部分为帖子正文上方部分（`view-head.html`），第二部分为帖子正文下方，评论上方（`view-mid.html`），第三部分为评论下方（TODO）。部分之间插入后端模块，由 `detailsAction.php` 获取 GET 方法得到的主键 ID，并直接在屏幕打印对应帖子正文。

---

### 数据表

**测试账户、数据表名称都在 `function.php` 配置** ~~（因为也不知道 `config.php` 是个啥玩意，晚点把它废掉吧）~~ 

> 其它位置需要到数据表名称时使用下面给出的变量，括号内的为字段类型。

* 用户 `{$userTable}`： 用户昵称 nickname (text), 用户账户 account (text), 用户密码 psword (text)
* 帖子 `{$userTable}`： 主键 id (bigint, AUTO_INCREMENT), 用户账户 account (text), 文章标题 bbs_title (text), 文章内容 bbs_content (text)