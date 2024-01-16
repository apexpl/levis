
# Designers - foreach Loops

You may iterate over blocks of HTML code when displaying lists of information such as rows within a data table by using the <code>&lt;s:foreach&gt;</code> tag, for example:

<pre><code class="prettyPrint">
&lt;s:foreach name="users" item="user"&gt;
    Username is &#126;user.username&#126;, full name is &#126;user.full_name&#126; and e-mail address is &#126;user.email&#126;
&lt;/s:foreach&gt;
</code></pre>

The above will loop through all items within the "users" block, and copy the table row of HTML while replacing the necessary variables.  Again, please consult with the back-end developers for the exact block names and variables the templates will support.

The <code>&lt;s:foreach&gt;</code> tag supports two attributes:

Attribute | Required | Description
------------- |------------- |------------- 
name | Yes | The block name as provided by the back-end developers.
item | No | Optional name of the array name used within the merge fields.  If left blank, defaults to the "name" attribute.




