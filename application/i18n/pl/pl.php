<?php defined('SYSPATH') or die('No direct script access.');

return array(
	// date
	'January'	=> 'Styczeń',
	'February'	=> 'Luty',
	'March'		=> 'Marzec',
	'April'		=> 'Kwiecień',
	'May'		=> 'Maj',
	'June'		=> 'Czerwiec',
	'July'		=> 'Lipiec',
	'August'	=> 'Sierpień',
	'September'	=> 'Wrzesień',
	'October'	=> 'Październik',
	'November'	=> 'Listopad',
	'December'	=> 'Grudzień',

	// fields
	'Thumb'				=> 'Miniatura',
	'Image'				=> 'Obraz',
	'Category'			=> 'Kategoria',
	'Title'				=> 'Tytuł',
	'URL'				=> 'Adres',
	'Description'		=> 'Opis',
	'Link'				=> 'Link',
	'Content'			=> 'Treść',
	'Username'			=> 'Login',
	'Password'			=> 'Hasło',
	'Password confirm'	=> 'Powtórz hasło',
	'Nick'				=> 'Nick',
	'Email'				=> 'Email',
	'Access'			=> 'Dostęp',
	'Date'				=> 'Data',

	// errors
	'Internal error: :param1'			=> 'Wystąpił błąd serwera: :param1',
	'page ":link" does not exists'		=> 'Strona ":link" nie istnieje',
	':field must not be empty'			=> 'Pole :field nie może być puste',
	':field must be the same as :param1'					=> 'Pole :field musi być takie samo jak pole :param1',
	':field does not match the required format'				=> 'Pole :field nie pasuje so formatu',
	':field must be exactly :param1 characters long'		=> 'Pole :field musi mieć :param1 znaków',
	':field must be at least :param1 characters long'		=> 'Pole :field musi posiadać przynajmniej :param1 znaków',
	':field must be less than :param1 characters long'		=> 'Pole :field musi posiadać najwyżej :param1 znaków',
	':field must be one of the available options'			=> 'Pole :field musi być jedną z dostepnych opcji',
	':field must be a digit'								=> 'Pole :field musi być cyfrą',
	':field must be a decimal with :param1 places'			=> 'Pole :field musi być liczbą z :param1 liczbami po przecinku',
	':field must be within the range of :param1 to :param2'	=> 'Pole :field musi zawierać się pomiędzy :param1 a :param2',
	'file :field must be valid'							=> 'Plik :field musi być prawidłowy',
	'file :field must not be empty'						=> 'Pole :field nie może być puste',
	'file :field (":param1") has wrong file type'		=> 'Plik :field posiada zły typ pliku',
	'file :field (":param1") is too big'				=> 'Plik :field jest zbyt duży',
	'file :field (":param1") already exists'			=> 'Plik :field (":param1") już istnieje',
	'file :field - file ":param1" not found'			=> ':field: nie znaziono pliku ":param1"',
	':field - such category does not exist'				=> ':field - wybrana kategoria nie istnieje',
	':field - folder ":param1" does not exist'			=> ':field - katalog ":param1" nie istnieje',
	':field must be valid url'							=> 'Pole :field musi być poprawnym adresem URL',
	':field must be unique'								=> 'Pole :field musi być unikalne - taka wartość już istnieje',
	':field must contain only letters, digits, dashes and underscores characters'	=> 'Pole :field może zawierać jedynie litery (bez polskich znaków), cyfry, myślniki i pokreślenia',
	':field must be a valid email'						=> 'Pole :field musi być poprawnym adresem email',
	'Server could not send your mail, please try again later'	=> 'Serwer nie mógł wysłać twojej wiadomości, spróbuj ponownie później',
	
	// pagination
	'First'		=> 'Pierwsza',
	'Previous'	=> 'Poprzednie',
	'Next'		=> 'Następne',
	'Last'		=> 'Ostatnia',
	'Loading'	=> 'Ładuję',
	
	// admin
	'Administration'			=> 'Panel administracyjny',
	'Home page'					=> 'Strona główna',
	'You are logged as: :nick'	=> 'Jesteś zalogowany jako: :nick',
	'Logout'					=> 'Wyloguj',
	'Home'						=> 'Home',
	'Images'					=> 'Obrazki',
	'Categories'				=> 'Kategorie',
	'Pages'						=> 'Strony',
	'Users'						=> 'Konta',
	'Logs'						=> 'Logi',
	
	'Options'					=> 'Opcje',
	'Rendered in :time seconds using :memory of memory.' => 'Wygenerowno w :time sekundy używając :memory KB pamięci.',
	
		// category
	'Create category'			=> 'Dodaj kategorię',
	'Update category'			=> 'Edytuj kategorię',
	'Delete category'			=> 'Usuń kategorię',
	'No. of images'				=> 'Liczba obrazków',
	'WARNING: deletion of this category will remove all images connected to it!'	=> 'UWAGA: usunięcie kategorii spowoduje usunięcie wszytkich obrazków do niej przypisanych!',
	'Number of connected images'		=> 'Liczba obrazków przypisanych',
	'Show images from category: :title'	=> 'Pokaż obrazki z kategori: :title',
	
		// image
	'Create image'			=> 'Dodaj obrazek',
	'Update image'			=> 'Edytuj obrazek',
	'Delete image'			=> 'Usuń obrazek',
	'Categories:'			=> 'Kategorie:',
	'Show all images'		=> 'Pokaż wszystkie obrazki',
	'Thumb'					=> 'Miniatura',
	'Leave current:'		=> 'Zostaw aktualny:',
	'Upload new:'			=> 'Załaduj nowy:',
	
		// main
	'Shortcuts'				=> 'Shortcuts',
	'Login:'				=> 'Login:',
	'Password:'				=> 'Hasło:',
	
		// page
	'Create page'			=> 'Dodaj stronę',
	'Update page'			=> 'Edytuj stronę',
	'Delete page'			=> 'Usuń stronę',
	
		// user
	'Create user'			=> 'Dodaj konto',
	'Update user'			=> 'Edytuj konto',
	'Delete user'			=> 'Usuń konto',
	'Change password'		=> 'Zmień hasło',
	'Activate'				=> 'Aktywuj',
	'Deactivate'			=> 'Deaktywuj',
	'Required 4 to 32 characters'	=> 'Wymagane 4 do 32 znaków',
	'Required 5 to 42 characters'	=> 'Wymagane 5 do 42 znaków',
	'Last logged'			=> 'Ostatnio zalogowani',
	
	// views
	'No images'							=> 'Brak obrazków w tej kategorii',
	'Portfolio: message from :email'	=> 'Portfolio: kontakt od :email',
	'Log is empty'						=> 'Dziennik jest pusty',
	'Error'								=> 'Błąd',
	'Create'							=> 'Dodaj',
	'Confirm'							=> 'Zatwierdź zmiany',
	'Delete'							=> 'Usuń',
	'Update'							=> 'Edytuj',
	'Cancel'							=> 'Anuluj',
);