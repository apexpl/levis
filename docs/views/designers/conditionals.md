
# Designers - Conditional if / else Tags

You may add conditional logic to the templates through the use of <code>&lt;s:if condition&gt; / &lt;s:else&gt;</code> tags, for example:

<pre><code class="prettyPrint">
&lt;s:if &#126;is_auth&#126; == 0&gt;
    You are not logged in.
&lt;s:else&gt;
    Hello &#126;profile.username&#126;
&lt;/s:if&gt;
</code></pre>


The above will check whether or not the global <code>&#126;is_auth&#126;</code> variable is equal to 0, and if so display a message saying the user is not logged in, otherwise will display a greeting.  A few notes regarding the <code>&lt;s:if&gt;</code> tag:

* You may use any variables desired within the condition, and they will be replaced with their corresponding value before the condition is evaluated.
* To use the greater than sign within the condition, use <code>gt</code>, and it will be evaluated as the greater than sign.
* There is no need to include <code>&lt;s:else&gt;</code> within the block, and its use is optional.




