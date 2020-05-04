## 帖子模块

* 后端目录：`controller/post`
* 前端目录：`view/post`

### 发布帖子 `post`
<!-- 用户输入帖子标题 `post_title` 内容 `post_content`，POST 到 `addAction.php` 检验数据合理性后，连同主键 ID 一并写入数据表 `$forum_bbs`。 -->

### 查看所有帖子 `list`
<!-- 对应文件：后端 `controller/listAction.php`，前端 `view/posts.html`

遍历数据表 `$forum_bbs`，打印所有帖子的标题。由 `listAction.php` 负责直接打印每个帖子对应的区块，例如 `<a href="view.php?id=1111" class="list-group-item list-group-item-action">Title</a>`，其中 `1111` 是主键 ID，`Title` 是文章标题。 -->

### 查看某一帖子 `view`
<!-- 对应文件（当前）：后端 `controller/detailsAction.php`，前端 `view/view-*.html`

前端视图由多个文件组装，第一部分为帖子正文上方部分（`view-head.html`），第二部分为帖子正文下方，评论上方（`view-mid.html`），第三部分为评论下方（`view-foot.html`）。两部分之间插入后端模块，其中帖子正文在一二部分之间。由 `detailsAction.php` 获取 GET 方法得到的主键 ID，并直接在屏幕打印对应帖子正文。 -->

### 删除帖子 `delete`
<!-- 对应文件：后端 `controller/delAction.php`

用户点击查看某一帖子页面中的删除按钮，`delAction.php` 获取帖子主键 ID，校验用户身份后从 `$forum_bbs` 删除帖子。 -->

### 编辑帖子 `edit`
<!-- 对应文件：后端 `controller/detailsAction.php` `controller/editAction.php`，前端 `view/edit.html`

由 `detailsAction.php` 根据帖子主键 ID 获取帖子内容打印到文本框供用户编辑，编辑完成后 POST 到 `editAction.php` 校验内容后更新数据表 `$forum_bbs`。 -->

