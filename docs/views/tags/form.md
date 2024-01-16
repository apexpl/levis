
# &lt;s:form&gt;

Short hand method to place a `&lt;form&gt;` tag within the web page, and accepts the following attributes, all of which are optional:

<s:data_table><thead><tr>
    <th>Attribute</th>
    <th>Required</th>
    <th>Description</th>
</tr></thead><tbody><tr>
    <td>action</td>
    <td>No</td>
    <td>The action of the form.  If not defined, uses the current page being viewed.</td>
</tr><tr>
    <td>method</td>
    <td>No</td>
    <td>Method of the form, defaults to POST.</td>
</tr><tr>
    <td>enctype</td>
    <td>No</td>
    <td>The enctype of the form, defaults to "application/x-www-form-urlencoded".</td>
</tr><tr>
    <td>file_upload</td>
    <td>No</td>
    <td>For simplicity and if set to 1, the enctype will be set to "multipart/form-data".</td>
</tr><tr>
    <td>id</td>
    <td>No</td>
    <td>Unique id of the form, defaults to "frmMain".</td>
</tr></s:data_table><br />


<h3>Example HTML</h3>

<pre><code class="prettyprint">
&lt;s:form&gt;
</code></pre><br />

<h3>Example Output</h3>

<s:form>
`&lt;form action="/tags/form" method="POST" enctype="application/x-www-form-urlencoded" id="frmMain"&gt;`


