
# &lt;s:select&gt; / &lt;s:ft_select&gt; / &lt;s:ft_checkbox&gt; / &lt;s:ft_radio&gt;

A select list which can be populated from a data source.  You may also use the <code>&lt;ft_select&gt; / &lt;s:ft_checkbox&gt; / &lt;s:ft_radio&gt;</code> tags as well when within a form table to display a two column table containg a select, checkbox or radio list.

Accepts the following attributes:

<s:data_table><thead><tr>
    <th>Attribute</th>
    <th>Required</th>
    <th>Description</th>
</tr></thead><tbody><tr>
    <td>name</td>
    <td>Yes</td>
    <td>The name of the select list</td>
</tr><tr>
    <td>required</td>
    <td>No</td>
    <td>A 1 or 0 defining whether or not a value is required.  If 0, the first option of the list will be blank with hyphens.  Defaults to 0.</td>
</tr><tr>
    <td>value</td>
    <td>No</td>
    <td>The value of the select list</td>
</tr><tr>
    <td>data_source</td>
    <td>No</td>
    <td>Optional data source defining where to pull the list options from.  See below for details.</td>
</tr><tr>
    <td>label</td>
    <td>No</td>
    <td>Only applicable if using a tag prefixed with <code>ft_</code> and is the label within the left column of the table.</td>
</tr></s:data_table><br />


<h3>Data Source</h3>

If the <code>data_source</code> attribute is provided, it defines where the options for the select list should be retrived from.  This is always a string delimited by periods, the first element being the type of data source.  For example:

<pre><code>
hash.users.log_action

table.user_groups.&#126;name&#126;.name

function.App\MyPackage\SomeClass.staticMethod

stdlist.timezone
</code></pre>

Below breaks down the four different types of data sources that are available:

#### hash

The hashes that are defined by back-end developers within the package.yml files of each package.  This data source contains two additional segments, the alias of the package, and the alias of the hash.  For example:

<pre><code>
    hash.myshop.product_status
</code></pre>

The above should populate the select list with all hash entries within the <code>product_status</code> hash of the <code>myshop</code> table.


#### function

Will call a static method to retrieve the list options.  Thie data source contains two additional segments, the fully qualified class name and the static method to call.  For example:

<pre><code>
    function.App\MyPackage\Products.getStatusOptions
</code></pre>

The above will call the <code>App\MyPackage\Products::getStatusOptions()</code> method statically, which expects a string returned being the HTML code of the options to display.  One argument will be passed to the method, being the selected value of the list.


#### table

Retrieve the list options from records in a database table.  This data source requires two additional segments, but allows for up to four additional segments.  The below table describes the available segments:

<s:data_table><thead><tr>
    <th>#</th>
    <th>Required</th>
    <th>Description</th>
</tr></thead><tbody><tr>
    <td>1</td>
    <td>Yes</td>
    <td>The name of the database table.</td>
</tr><tr>
    <td>2</td>
    <td>Yes</td>
    <td>The display name of the option.  Accepts merge fields such as &#126;name&#126; which are replaced by their respective values of each database record.</td>
</tr><tr>
    <td>3</td>
    <td>No</td>
    <td>The column which to sort records within the table by.  Defaults to <code>name</code></td>
</tr><tr>
    <td>4</td>
    <td>No</td>
    <td>The column to use as the value of the list option.  Defaults to <code>id</code></td>
</tr></s:data_table>,br />

For example:

<pre><code>
    table.user_groups.&#126;name&#126; (ID# &#126;id&#126;).name
</code></pre>

The above would display a list of all records within the <code>user_groups</code> table with the group name followed by its id# in parantheses.


#### stdlist

There are several standardized lists you may also use.  This data source only accepts one additional segment, the list to display and can be one of the following:

<pre><code>
    stdlist.timezone
    stdlist.currency
    stdlist.country
    stdlist.language
</code></pre><br />

<h3>Example HTML</h3>

<pre><code class="prettyprint">
&lt;s:select name="status" data_source="hash.users.log_action"&gt;

&lt;s:form_table&gt;
    &lt;s:ft_select label="Log Action" name="log" data_source="hash.users.log_action"&gt;
    &lt;s:ft_checkbox label="Log Action" name="log" data_source="hash.users.log_action"&gt;
    &lt;s:ft_radio label="Log Action" name="log" data_source="hash.users.log_action"&gt;
&lt;/s:form_table&gt;
</code></pre><br />


<h3>Example Output</h3>

<s:select name="status" data_source="hash.users.log_action">

<s:form_table>
    <s:ft_select label="Log Action" name="log" data_source="hash.users.log_action">
    <s:ft_checkbox label="Log Action" name="log" data_source="hash.users.log_action">
    <s:ft_radio label="Log Action" name="log" data_source="hash.users.log_action">
</s:form_table>



