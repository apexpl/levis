
# Apex\Cli\Cli

> Main class to handle CLI functionality.

* public [__construct](__construct.md)([ array | string &#36;cmd_namespace = 'App\Console' ], [ bool &#36;autoconfirm_typos = false ], [ ?ApexContainerInterface &#36;cntr = null ]):.md
* public [addShortcut](addshortcut.md)(string &#36;shortcut, string &#36;cmd): void.md
* public [addShortcuts](addshortcuts.md)(array &#36;shortcuts, [ ?string &#36;parent = null ]): void.md
* public [applyShortcuts](applyshortcuts.md)(array &#36;args): array.md
* public [checkTypos](checktypos.md)(array &#36;tmp_args): array.md
* public [convert_case](convert_case.md)(string &#36;word, [ string &#36;case = 'title' ]): string.md
* public [determineRoute](determineroute.md)(array &#36;args): ?string.md
* public [error](error.md)(string &#36;message):.md
* public  static[get](get.md)(string &#36;first, string &#36;second): array.md
* public [getArgs](getargs.md)([ array &#36;has_value = [] ], [ bool &#36;return_args = false ]): array.md
* public [getConfirm](getconfirm.md)(string &#36;message, [ string &#36;default = '' ]): bool.md
* public [getInput](getinput.md)(string &#36;label, [ string &#36;default_value = '' ], [ bool &#36;is_secret = false ]): string.md
* public [getNewPassword](getnewpassword.md)([ string &#36;label = 'Desired Password' ], [ bool &#36;allow_empty = false ], [ int &#36;min_score = '2' ]): ?string.md
* public [getOption](getoption.md)(string &#36;message, array &#36;options, [ string &#36;default_value = '' ], [ bool &#36;add_numbering = false ]): string.md
* public [getRootDirectory](getrootdirectory.md)(string &#36;root_namespace): ?string.md
* public [getSigningPassword](getsigningpassword.md)(): ?string.md
* public [run](run.md)(): void.md
* public [send](send.md)(string &#36;data): void.md
* public [sendArray](sendarray.md)(array &#36;inputs): void.md
* public [sendHeader](sendheader.md)(string &#36;label): void.md
* public [sendTable](sendtable.md)(array &#36;rows): void.md
* public [setSigningPassword](setsigningpassword.md)(string &#36;password): void.md
* public [success](success.md)(string &#36;message, [ array &#36;files = [] ]): void.md


