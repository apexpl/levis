
# &lt;s:form_table&gt;

<p>Provides a two column form table along with various `&lt;ft_*&gt;` tags available for the individual rows and form fields, as shown in the below example.  A few quick notes regarding the tags below:</p>

<ul>
    <li>All `&lt;ft_*&gt;` tags below are available as single form field tags without the "ft_" suffix (eg. `&lt;s:textbox&gt;`).  The "ft_" suffix simply wraps the form field in a two column table row with a label in the left column.</li>
    <li>All form field tags require a "name" attribute.</li>
    <li>All form field tags allow an optional "value" attribute.</li>
    <li>All form field tags allow an optional "label" attribute, which is the text displayed in the left column.  If no "label" attribute is defined, the titlecase version of the "name" attribute is used.</li>
</ul><br />

<p>The below example quickly showcases all form fields available via Syrus tags.</p><br />


<h3>Example HTML</h3>

<pre><code class="prettyprint"><br />&lt;s:form_table&gt;
    &lt;s:ft_textbox name="username"&gt;
    &lt;s:ft_textbox name="password" type="password"&gt;
    &lt;s:ft_seperator label="Additional Info"&gt;
    &lt;s:ft_select name="status"&gt;
        &lt;option&gt;Active&lt;/option&gt;
        &lt;option&gt;Inactive&lt;/option&gt;
        &lt;option&gt;Pending&lt;/option&gt;
    &lt;/s:ft_select&gt;
    &lt;s:ft_boolean name="subscribe" value="1" label="Would you like to receive updates?"&gt;
    &lt;s:ft_amount name="amount" label="Donation"&gt;
    &lt;s:ft_date_interval_selector name="frequency" value="M1"&gt;
    &lt;s:ft_date_selector name="time_to_call" required="1"&gt;
    &lt;s:ft_time_selector name="time_to_call" required="1"&gt;
    &lt;s:ft_phone name="phone"&gt;
    &lt;s:ft_textarea name="about_me"&gt;
    &lt;s:ft_label label="Some Label" value="Value within right column"&gt;
    &lt;s:ft_submit value="create" label="Register Now"&gt;
&lt;/s:form_table&gt;

</code></pre>


<h3>Example Output</h3>

<s:form_table>
    <s:ft_textbox name="username">
    <s:ft_textbox name="password" type="password">
    <s:ft_seperator label="Additional Info">
    <s:ft_select name="status">
        <option>Active</option>
        <option>Inactive</option>
        <option>Pending</option>
    </s:ft_select>
    <s:ft_boolean name="subscribe" value="1" label="Would you like to receive updates?">
    <s:ft_amount name="amount" label="Donation">
    <s:ft_date_interval_selector name="frequency" value="M1">
    <s:ft_date_selector name="date_to_call" required="1">
    <s:ft_time_selector name="time_to_call" required="1">
    <s:ft_phone name="phone">
    <s:ft_label label="Some Label" value="Value within right column">
    <s:ft_textarea name="about_me">
    <s:ft_submit value="create" label="Register Now">
</s:form_table>


