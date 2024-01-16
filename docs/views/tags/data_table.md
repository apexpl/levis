
# &lt;s:data_table&gt;

>p>Used for data tables and includes optional search bar, pagination, and footer button group.  Some pertinent notes regarding data tables are:</p>

<ul>
    <li>Tables should always include `&lt;thead&gt;` and `&lt;tbody&gt;` tags, as it helps determine things such as total number of columns, and header columns.</li>
    <li>If `has_search` attribute is set to 1, a new row will be added to the table just after the opening `&lt;thead&gt;` tag with the search box.</li>
    <li>Syrus will go through all `&lt;th&gt;` tags within the last row of the `&lt;thead&gt;`, and replace them with the contents of the `[[data_table.th]]` HTML snippet found within the tags.txt file.
    <ul>
        <li>Within the `&lt;th&gt;` columns you may place a `has_sort="1"` attribute, and if present, the sort ascending / descending links will be placed within the header column.  Look at the tags.txt file, and you will see how this works.</li>
        <li>If the `has_sort="1"` attribute is present, you may add an optional `alias="xxx"` attribute where `xxx` is the name of the column to sort by and is replaced as the `~col_alias~` merge field you will see in the tags.txt file.  If not present, this defaults to the lowercase with underscores version of the column name.</li>
    </ul></li>
    <li>You may place `&lt;s:button_group&gt; ... &lt;/s:button_group&gt;` tags anywhere within the `&lt;s:data_table&lt; tag.  If present, they will be removed, and the contents will be placed in the bottom left corner of the table inside a footer row.  If pagination is being used, the footer row will consist of the button group on the left side, and the pagination links on the right side of the row.</li>
</ul>

<p>The `&lt;s:data_table&gt;` tag tag supports the following attributes:</p>

<s:data_table><thead><tr>
    <th>Attribute</th>
    <th>Required</th>
    <th>Description</th>
</tr></thead><tbody><tr>
    <td>id</td>
    <td>No</td>
    <td>Unique id of the table element.  Defaults to "tblMain".</td>
</tr><tr>
    <td>has_search</td>
    <td>No</td>
    <td>Can be either 0 or 1, and if set to 1, a search box will be placed at the top right corner of the table. Defaults to 0.</td>
</tr><tr>
    <td>search_href</td>
    <td>No</td>
    <td>If `has_search` is 1, this is where the search button links to, generally a Javascript call.</td>
</tr><tr>
    <td>search_label</td>
    <td>No</td>
    <td>If `has_search` is 1, the place holder of the search box.  Defaults to "Search".</td>
</tr><tr>
    <td>total_rows</td>
    <td>No</td>
    <td>Used for pagination, and the total number of rows available in the full result set.</td>
</tr><tr>
    <td>rows_per_page</td>
    <td>No</td>
    <td>Used for pagination, and the number of rows displayed per page.  Defaults to 25.</td>
</tr><tr>
    <td>current_page</td>
    <td>No</td>
    <td>Used for pagination, and the current page being displayed.  Defaults to 1.</td>
</tr><tr>
    <td>max_items</td>
    <td>No</td>
    <td>Used for pagination, and is the maximum number of page items to display within the pagination links, not including the prev / next items.  Defaults to 10.</td>
</tr><tr>
    <td>pgn_href</td>
    <td>No</td>
    <td>Used for pagination, and is the `href` of each page item link.  The text "page=X" will be appended to this href, where X is the page number of the item.</td>
</tr><tr>
    <td>sort_href</td>
    <td>No</td>
    <td>Used within sorting array links within header columns (see below), and is the location those links will point to, generally a Javascript call.</td>
</tr></tbody></s:data_table><br /> 


<h3>Example HTML</h3>

<pre><code class="prettyprint"><br />&lt;s:data_table has_search="1" total_rows="384" current_page="3" rows_per_page="25"&gt;

&lt;s:button_group&gt;
    &lt;s:button href="#" label="Delete Checked Rows"&gt;
&lt;/s:button_group&gt;
&lt;thead&gt;&lt;tr&gt;
    &lt;th has_sort="1"&gt;Date&lt;/th&gt;
    &lt;th&gt;Full Name&lt;/th&gt;
    &lt;th has_sort="1"&gt;Amount&lt;/th&gt;
    &lt;th&gt;Manage&lt;/th&gt;
&lt;/tr&gt;&lt;/thead&gt;

&lt;tbody&gt;&lt;tr&gt;
    &lt;td&gt;Mar 21, 2021 at 14:22&lt;/td&gt;
    &lt;td&gt;John Smith&lt;/td&gt;
    &lt;td&gt;$29.95&lt;/td&gt;
    &lt;td align="center"&gt;&lt;s:button href="#" label="Manage"&gt;&lt;/td&gt;
&lt;/tr&gt;&lt;tr&gt;
    &lt;td&gt;Mar 24, 2021 at 09:53&lt;/td&gt;
    &lt;td&gt;Mike Jacobs&lt;/td&gt;
    &lt;td&gt;$53.95&lt;/td&gt;
    &lt;td align="center"&gt;&lt;s:button href="#" label="Manage"&gt;&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;&lt;/s:data_table&gt;

</code></pre>


<h3>Example Output:</h3>

<s:data_table has_search="1" total_rows="384" current_page="3" rows_per_page="25">

<s:button_group>
    <s:button href="#" label="Delete Checked Rows">
</s:button_group>
<thead><tr>
    <th has_sort="1">Date</th>
    <th>Full Name</th>
    <th has_sort="1">Amount</th>
    <th>Manage</th>
</tr></thead>

<tbody><tr>
    <td>Mar 21, 2021 at 14:22</td>
    <td>John Smith</td>
    <td>$29.95</td>
    <td align="center"><s:button href="#" label="Manage"></td>
</tr><tr>
    <td>Mar 24, 2021 at 09:53</td>
    <td>Mike Jacobs</td>
    <td>$53.95</td>
    <td align="center"><s:button href="#" label="Manage"></td>
</tr>
</tbody></s:data_table>


