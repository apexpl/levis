
# &lt;s:code&gt;

<p>Formats the innter HTML as source code via the Prism Javascript library.  Default language is PHP.</p>

<h3>Example HTML</h3>

&lt;s:code&gt;

class MyClass
{

    /**
     * Some method
     */
    public function someMethod(string $name, string $email):int
    {
        return 5;
    }

}
&lt;/s:code&gt;



<h3>Example Output</h3>

<s:code>

class MyClass
{

    /**
     * Some method
     */
    public function someMethod(string $name, string $email):int
    {
        return 5;
    }

}
</s:code>


