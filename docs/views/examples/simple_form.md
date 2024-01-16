
# Views - Examples - Simple Form

<code>
&lt;h1&gt;Simple Form Example&lt;/h1&gt;<br />
<br />
&lt;s:form&gt;<br />
<br />
&lt;s:box&gt;<br />
    &lt;s:box_header title="Example Form"&gt;<br />
        &lt;p&gt;This is an example form.<br />
    &lt;/s:box_header&gt;<br />
<br />
    &lt;s:form_table&gt;<br />
        &lt;s:ft_boolean name="is_active"&gt;<br />
        &lt;s:ft_select name="status" required="1" data_source="hash.transaction.status<br />
        &lt;s:ft_textbox name="full_name"&gt;<br />
        &lt;s:ft_textbox name="email" label="E-Mail Address" datatype="email"&gt;<br />
        &lt;s:ft_submit value="add" label="Add New Entry"&gt;<br />
    &lt;/s:form_table&gt;<br />
</code>

&lt;/s:box&gt;

