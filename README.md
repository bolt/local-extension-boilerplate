Boilerplate Extension
=====================

This is a boilerplate Local Extension for Bolt 3.3 and up. Clone, search and replace, and hack away. 

To set up, do the following, replacing `[Name]` with the desired name of your extension.  

```
mkdir -p extensions/local
git clone https://github.com/bolt/local-extension-boilerplate extensions/local/[Name]
cd extensions/local/[Name]
sed -i 's/Boilerplate/[Name]/g' BoilerplateExtension.php
mv src/BoilerplateExtension.php src/[Name]Extension.php
```

After this, your local extension is ready, and you can start editing it. 

Note that you might need to add `extensions/local` to the Autoloader, as described in the [Bolt documentation][bundled]. 

[bundled]: https://docs.bolt.cm/3.3/howto/installing-bundled-extensions
