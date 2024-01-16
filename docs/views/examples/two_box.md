
# Views - Examples - Two Panel / Box Page

<code>
&lt;h1&gt;Example Two Panel Page&lt;/h1&gt;<br />
<br />
&lt;s:form&gt;<br />
<br />
&lt;s:box&gt;<br />
    &lt;s:box title="Existing Users"&gt;<br />
            &lt;p&gt;The below table lists all existing products within the system.&lt;/p&gt;<br />
    &lt;/s:box&gt;<br />
<br />
    &lt;s:function alias="display_table" table="my-package.products"&gt;<br />
&lt;/s:box&gt;<br />
<br />
&lt;s:box&gt;<br />
    &lt;s:box_header title="Create New Product"&gt;<br />
        &lt;p&gt;You may create a new product by completing the below form.&lt;/p&gt;<br />
    &lt;/s:box_header&gt;<br />
<br />
    &lt;s:form_table&gt;<br />
        &lt;s:ft_select name="category_id" label="Category" required="1" data_source="hash.my-package.categories"&gt;<br />
        &lt;s:ft_textbox name="name"&gt;<br />
        &lt;s:ft_select value="create" label="Create New Product"&gt;<br />
    &lt;/s:form_table&gt;<br />
<br />
&lt;/s:box&gt;<br />
</code>



