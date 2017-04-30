<?php

use yii\web\View;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;

$this->registerCssFile('@web/css/shi_default.min.css');

?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Yii2 boilerplate app <a href="https://github.com/gazbond/yii2-boilerplate-app"><img src="images/github.png" /></a></h1>
        <p>A selection of Yii2 framework extensions and tools configured and ready for building web applications</p>
        <img class="img-responsive center-block" src="images/cooking-pot.png">
        <br>
        <br>
        <p>Pre-configured administration pages - users/roles/permissions/settings/posts/files</p>
        <p>ORM (Object Relational Mapping) tools for working with relational databases and search indexes</p>
        <p>RESTful API tools for exposing resources to end users with authentication and authorization</p>
        <p>Pre-configured Angular v4 boilerplate application</p>
        <br>
        <p>
            <a class="btn btn-lg btn-success" href="http://www.yiiframework.com/doc-2.0/guide-README.html">Get started with Yii2</a>
            <a class="btn btn-lg btn-danger" href="https://angular.io/docs/ts/latest/">Angular v4</a>
        </p>
        <br>
        <hr>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <h4>Administration pages:</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="img-fluid">
                    <img src="images/admin-screenshot-1.png" class="thumbnail img-responsive center-block">
                    <img src="images/admin-screenshot-2.png" class="thumbnail img-responsive center-block">
                    <img src="images/admin-screenshot-3.png" class="thumbnail img-responsive center-block">
                    <img src="images/admin-screenshot-4.png" class="thumbnail img-responsive center-block">
                    <img src="images/admin-screenshot-5.png" class="thumbnail img-responsive center-block">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4>Why Yii2?</h4>
                <br>
                <p>Configurations are widely used in Yii2 for creating new objects or initializing existing objects.</p>
                <p>The dependency injection (DI) container knows how to instantiate and configure objects and all their
                    dependent objects.</p>
                <div class="snippet-container"><div class="sh_default snippet-wrap"><div class="snippet-menu sh_sourceCode"></div><pre class="shi_pre sh_php snippet-formatted sh_sourceCode" style="display: block;"><ul class="snippet-no-num"><li><span class="sh_comment">// create an object using configuration array</span></li><li><span class="sh_variable">$object</span> <span class="sh_symbol">=</span> Yii<span class="sh_symbol">::</span><span class="sh_function">createObject</span><span class="sh_symbol">([</span></li><li>    <span class="sh_string">'class'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_string">'yii\db\Connection'</span><span class="sh_symbol">,</span></li><li>    <span class="sh_string">'dsn'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_string">'mysql:host=127.0.0.1;dbname=demo'</span><span class="sh_symbol">,</span></li><li>    <span class="sh_string">'username'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_string">'root'</span><span class="sh_symbol">,</span></li><li>    <span class="sh_string">'password'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_string">''</span><span class="sh_symbol">,</span></li><li>    <span class="sh_string">'charset'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_string">'utf8'</span><span class="sh_symbol">,</span></li><li><span class="sh_symbol">]);</span></li></ul></pre><pre class="snippet-textonly sh_sourceCode" tabindex="0" contenteditable="" style="display: none;">// create an object using configuration array
                $object = Yii::createObject([
                    'class' =&gt; 'yii\db\Connection',
                    'dsn' =&gt; 'mysql:host=127.0.0.1;dbname=demo',
                    'username' =&gt; 'root',
                    'password' =&gt; '',
                    'charset' =&gt; 'utf8',
                ]);</pre></div></div>
                <br>
                <br>
                <p>Yii2s DAO (Database Access Objects) and ORM (Object Relational Mapping) provide object-oriented APIs for accessing relational
                    databases and search indexes.</p>
                <div class="snippet-container"><div class="sh_default snippet-wrap"><div class="snippet-menu sh_sourceCode"></div><pre class="shi_pre sh_php snippet-formatted sh_sourceCode"><ul class="snippet-no-num"><li><span class="sh_comment">// Query database</span></li><li><span class="sh_variable">$rows</span> <span class="sh_symbol">=</span> <span class="sh_symbol">(</span><span class="sh_keyword">new</span> yii<span class="sh_symbol">\</span>db<span class="sh_symbol">\</span><span class="sh_function">Query</span><span class="sh_symbol">())</span></li><li>    <span class="sh_symbol">-&gt;</span><span class="sh_function">select</span><span class="sh_symbol">([</span><span class="sh_string">'id'</span><span class="sh_symbol">,</span> <span class="sh_string">'email'</span><span class="sh_symbol">])</span></li><li>    <span class="sh_symbol">-&gt;</span><span class="sh_function">from</span><span class="sh_symbol">(</span><span class="sh_string">'user'</span><span class="sh_symbol">)</span></li><li>    <span class="sh_symbol">-&gt;</span><span class="sh_function">where</span><span class="sh_symbol">([</span><span class="sh_string">'last_name'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_string">'Smith'</span><span class="sh_symbol">])</span></li><li>    <span class="sh_symbol">-&gt;</span><span class="sh_function">limit</span><span class="sh_symbol">(</span><span class="sh_number">10</span><span class="sh_symbol">)</span></li><li>    <span class="sh_symbol">-&gt;</span><span class="sh_function">all</span><span class="sh_symbol">();</span></li></ul></pre><pre class="snippet-textonly sh_sourceCode" style="display:none;" tabindex="0" contenteditable="">// Query database
                $rows = (new yii\db\Query())
                    -&gt;select(['id', 'email'])
                    -&gt;from('user')
                    -&gt;where(['last_name' =&gt; 'Smith'])
                    -&gt;limit(10)
                    -&gt;all();</pre></div></div>
                <br>
                <br>
                <p>Yii2 provides RESTful API tools for exposing resources to end users with authentication (JWT) and authorization (roles/permissions) access control</p>
                <div class="snippet-container"><div class="sh_default snippet-wrap"><div class="snippet-menu sh_sourceCode"></div><pre class="shi_pre sh_php snippet-formatted sh_sourceCode"><ul class="snippet-no-num"><li><span class="sh_comment">// Map database model to API endpoint</span></li><li><span class="sh_keyword">use</span> yii<span class="sh_symbol">\</span>rest<span class="sh_symbol">\</span>ActiveController<span class="sh_symbol">;</span></li><li></li><li><span class="sh_keyword">class</span> UserController <span class="sh_keyword">extends</span> ActiveController</li><li><span class="sh_cbracket">{</span></li><li>    public <span class="sh_variable">$modelClass</span> <span class="sh_symbol">=</span> <span class="sh_string">'app\models\User'</span><span class="sh_symbol">;</span></li><li></li><li>    public <span class="sh_keyword">function</span> <span class="sh_function">behaviors</span><span class="sh_symbol">()</span></li><li>    <span class="sh_cbracket">{</span></li><li>        <span class="sh_variable">$behaviors</span> <span class="sh_symbol">=</span> parent<span class="sh_symbol">::</span><span class="sh_function">behaviors</span><span class="sh_symbol">();</span></li><li>        <span class="sh_variable">$behaviors</span><span class="sh_symbol">[</span><span class="sh_string">'access'</span><span class="sh_symbol">]</span> <span class="sh_symbol">=</span> <span class="sh_symbol">[</span></li><li>            <span class="sh_string">'class'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_string">'yii\filters\AccessControl'</span><span class="sh_symbol">,</span></li><li>            <span class="sh_string">'rules'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_symbol">[</span></li><li>                <span class="sh_symbol">[</span></li><li>                    <span class="sh_string">'allow'</span> <span class="sh_symbol">=&gt;</span> true<span class="sh_symbol">,</span></li><li>                    <span class="sh_string">'actions'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_symbol">[</span><span class="sh_string">'options'</span><span class="sh_symbol">],</span></li><li>                    <span class="sh_string">'roles'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_symbol">[</span><span class="sh_string">'?'</span><span class="sh_symbol">]</span></li><li>                <span class="sh_symbol">],</span></li><li>                <span class="sh_symbol">[</span></li><li>                    <span class="sh_string">'allow'</span> <span class="sh_symbol">=&gt;</span> true<span class="sh_symbol">,</span></li><li>                    <span class="sh_string">'actions'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_symbol">[</span><span class="sh_string">'index'</span><span class="sh_symbol">,</span> <span class="sh_string">'view'</span><span class="sh_symbol">],</span></li><li>                    <span class="sh_string">'roles'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_symbol">[</span><span class="sh_string">'@'</span><span class="sh_symbol">]</span></li><li>                <span class="sh_symbol">],</span></li><li>                <span class="sh_symbol">[</span></li><li>                    <span class="sh_string">'allow'</span> <span class="sh_symbol">=&gt;</span> true<span class="sh_symbol">,</span></li><li>                    <span class="sh_string">'actions'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_symbol">[</span><span class="sh_string">'update'</span><span class="sh_symbol">,</span> <span class="sh_string">'create'</span><span class="sh_symbol">,</span> <span class="sh_string">'delete'</span><span class="sh_symbol">],</span></li><li>                    <span class="sh_string">'roles'</span> <span class="sh_symbol">=&gt;</span> <span class="sh_symbol">[</span><span class="sh_string">'admin'</span><span class="sh_symbol">]</span></li><li>                <span class="sh_symbol">]</span></li><li>            <span class="sh_symbol">]</span></li><li>        <span class="sh_symbol">];</span></li><li>        <span class="sh_keyword">return</span> <span class="sh_variable">$behaviors</span><span class="sh_symbol">;</span></li><li>    <span class="sh_cbracket">}</span></li><li><span class="sh_cbracket">}</span></li></ul></pre><pre class="snippet-textonly sh_sourceCode" style="display:none;" tabindex="0" contenteditable="">// Map database model to API endpoint
                use yii\rest\ActiveController;

                class UserController extends ActiveController
                {
                    public $modelClass = 'app\models\User';

                    public function behaviors()
                    {
                        $behaviors = parent::behaviors();
                        $behaviors['access'] = [
                            'class' =&gt; 'yii\filters\AccessControl',
                            'rules' =&gt; [
                                [
                                    'allow' =&gt; true,
                                    'actions' =&gt; ['options'],
                                    'roles' =&gt; ['?']
                                ],
                                [
                                    'allow' =&gt; true,
                                    'actions' =&gt; ['index', 'view'],
                                    'roles' =&gt; ['@']
                                ],
                                [
                                    'allow' =&gt; true,
                                    'actions' =&gt; ['update', 'create', 'delete'],
                                    'roles' =&gt; ['admin']
                                ]
                            ]
                        ];
                        return $behaviors;
                    }
                }</pre></div></div>
            </div>
        </div>
    </div>
</div>
