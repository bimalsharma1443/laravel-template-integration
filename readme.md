# Theme integration into Laravel Framework with CRUD operation.

Here we are doing admin templet i.e. ADMINLTE into Laravel Framework. Following steps are to integrate a theme.

## Steps 1: - Create layout folder. 

* **create Layout Folder under resource/view.**
* **Create template.blade.php in side the Layout folder.**
* **Create common blade which is used in all view page. For e.g. head.blade.php, header.blade.php, footer.blade.php, left_side.blade.php.**
* **To load this page write `@include('YOUR_FILE_NAME')`.**

## Step 2: - Create view file under view folder.

## Step 3: - Load templade.blade in view file.

* **Load template into view file using `@extends` and write it on top of the view file.   							@extends('TEMPLATE_PATH_WITH_NAME_WITHOUT_EXTENSION');

* **Create `@section` in view template to part view page in section.**

				@section('SECTION_NAME');

* **Load section in template with `@yield`.**

				@yield('SECTION_NAME');								 
