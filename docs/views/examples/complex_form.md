
# Views - Examples - Complex Form

<code>
&lt;h1&gt;Add Transaction&lt;/h1&gt;<br />
<br />
&lt;s:form&gt;<br />
<br />
&lt;s:box&gt;<br />
    &lt;s:box_header title="Transaction Details"&gt;<br />
        &lt;p&gt;Complete the below form with the necessary details, and the new transaction will be immediately added to the user's account.&lt;/p&gt;<br />
    &lt;/s:box_header&gt;<br />
<br />
    &lt;s:form_table&gt;<br />
            &lt;s:ft_twocol label="User"&gt;<br />
                &lt;s:function alias="display_auto_complete" autocomplete="users.find" name="user"&gt; <br />
            &lt;/s:ft_twocol&gt;<br />
        &lt;s:ft_select name="adapter" label="Type" required="1"&gt;~adapter_options~&lt;/s:ft_select&gt;<br />
        &lt;s:ft_twocol label="Amount"&gt;<br />
            &lt;s:amount name="amount"&gt;<br />
            &lt;s:if ~show_currency~ == 1&gt;<br />
                &lt;span&gt;&lt;s:select name="currency" data_source="table.transaction_currencies.~abbr~.abbr.abbr" required="1" value="~config.core.default_currency~"&gt;&lt;/span&gt;<br />
            &lt;/s:if&gt;<br />
        &lt;/s:ft_twocol&gt;<br />
        &lt;s:ft_seperator label="Optional"&gt;<br />
        &lt;s:ft_select name="status"&gt;<br />
            &lt;option value=""&gt;--------------------<br />
            ~status_options~<br />
        &lt;/s:ft_select&gt;<br />
        &lt;s:ft_textbox name="description" label="Short Description" maxlength="80"&gt;<br />
        &lt;s:ft_textarea name="note" label="Optional Note"&gt;<br />
        &lt;s:ft_submit value="add" label="Add New Transaction"&gt;<br />
    &lt;/s:form_table&gt;<br />
<br />
&lt;/s:box&gt;<br />
</code>


