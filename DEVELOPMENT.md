## 用户部分

### 注册
对应文件：后端 `controller/regAction.php`，前端 `view/register.html`。

用户输入账户 `account` 昵称 `nickname` 密码 `psword`，POST 到 `regAction.php`，检验数据合理性后写入数据表 `forum_user`。

### 登录
对应文件：后端 `controller/loginAction.php`，前端 `view/login.html`。

用户输入账户 `account` 密码 `psword`，POST 到 `loginAction.php`，从数据表 `forum_user` 里寻找 `account` 所在行并验证密码是否正确，正确则设置 session。

### 个人中心
对应文件：后端 `controller/userAction.php`，前端 `view/user.html`

显示已登录用户的账户 `account`、昵称 `nickname`、发布的帖子（在查看所有帖子模块上改编即可）等信息。

### 注销
对应文件：后端 `controller/logoutAction.php`

清理已经设置的 session。

---

## 帖子部分

### 发布帖子
对应文件：后端 `controller/addAction.php`，前端 `view/create.html`。

用户输入帖子标题 `bbs_title` 内容 `bbs_content`，POST 到 `addAction.php` 检验数据合理性后，连同主键 ID 一并写入数据表 `$forum_bbs`。

### 查看所有帖子
对应文件：后端 `controller/listAction.php`，前端 `view/posts.html`

遍历数据表 `$forum_bbs`，打印所有帖子的标题。由 `listAction.php` 负责直接打印每个帖子对应的区块，例如 `<a href="view.php?id=1111" class="list-group-item list-group-item-action">Title</a>`，其中 `1111` 是主键 ID，`Title` 是文章标题。

### 查看某一帖子
对应文件（当前）：后端 `controller/detailsAction.php`，前端 `view/view-*.html`

前端视图由多个文件组装，第一部分为帖子正文上方部分（`view-head.html`），第二部分为帖子正文下方，评论上方（`view-mid.html`），第三部分为评论下方（`view-foot.html`）。两部分之间插入后端模块，其中帖子正文在一二部分之间。由 `detailsAction.php` 获取 GET 方法得到的主键 ID，并直接在屏幕打印对应帖子正文。

### 删除帖子
对应文件：后端 `controller/delAction.php`

用户点击查看某一帖子页面中的删除按钮，`delAction.php` 获取帖子主键 ID，校验用户身份后从 `$forum_bbs` 删除帖子。

### 编辑帖子
对应文件：后端 `controller/detailsAction.php` `controller/editAction.php`，前端 `view/edit.html`

由 `detailsAction.php` 根据帖子主键 ID 获取帖子内容打印到文本框供用户编辑，编辑完成后 POST 到 `editAction.php` 校验内容后更新数据表 `$forum_bbs`。

### 发表评论
对应文件：后端 `controller/commentAction.php`，前端 `view/view-*.html`

用户在「查看某一帖子」页下方输入评论内容 `content`，POST 到 `commentAction.php`，检验数据合理性后，连同 **帖子的** 主键 ID 和发帖人 `account` 一并写入数据表 `$forum_bbs`。

### 查看评论
对应文件：后端 `controller/commentListAction.php`，前端 `view/view-*.html`

后端获取 **帖子的** 主键 ID 后取出所有有该 ID 的数据并打印。前后端负责范围同「查看所有帖子」，即后端负责打印 `<li class="list-group-item">Account：Comment</li>`，其中 `Account` 为评论人账户，`Comment` 为评论内容。

---

## 数据表

**测试账户、数据表名称都在 `function.php` 配置** ~~（因为也不知道 `config.php` 是个啥玩意，晚点把它废掉吧）~~ 

> 其它位置需要到数据表名称时使用下面给出的变量，括号内的为字段类型。

* 用户 `$userTable`： 用户昵称 nickname (text), 用户账户 account (text), 用户密码 psword (text)
* 帖子 `$userTable`： 主键 id (bigint, AUTO_INCREMENT), 用户账户 account (text), 文章标题 bbs_title (text), 文章内容 bbs_content (text)
* 评论 `$comTable`： **帖子** 主键 id (bigint), 用户账户 account (text), 评论内容 content (text)