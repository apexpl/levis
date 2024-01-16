
# Designers - Variables

Variables are simply strings surrounded by &#126; tilde marks, for example:

<pre><code>
&#126;full_name&#126;
&#126;total_amount&#126;
</code></pre>

Above are examples of variables, and upon the template being rendered, will be replaced with their corresponding value.  Every page / operation is different, and please consult with either any available documentation or the back-end developers for a list of variables the templates support.


## Arrays

Arrays are also supported and are separated by a period.  For example:

<pre><code>
&#126;user.email&#126;
&#126;user.full_name&#126;
</code></pre>

The above would be replaced with the "username" and "full_name" elements of the "user" array.  Again, please consult with the back-end developers as to which variables the templates support.




