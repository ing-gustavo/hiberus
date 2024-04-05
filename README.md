<h1>Project Documentation</h1>

<h2>Overview</h2>

<p>This document provides an overview of the decisions made during the development of the CRUD system that manages drivers, vehicles, and trips.</p>

<h2>Project Structure</h2>


<h3>Models</h3>
<p>The project utilizes Laravel framework to build a CRUD (Create, Read, Update, Delete) system. It consists of three main tables:</p>

<ol>
    <li><strong>Drivers table:</strong> Stores information about drivers.</li>
    <li><strong>Vehicles table:</strong> Stores information about vehicles.</li>
    <li><strong>Trips table:</strong> Stores information about trips associated with drivers and vehicles.</li>
</ol>

<h4>Driver and Vehicle relations</h4>

<pre>
  <code class="php">
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
    
    public function hasTrips()
    {
        return $this->trips()->exists();
    }
  </code>
</pre>

<h4>Trip relations</h4>

<pre>
  <code class="php">
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
  </code>
</pre>

<h4>Reasons for Decisions</h4>
<ol>

  <li>
    The trips() function establishes a one-to-many relationship between the Driver model and the Trip model. This allows easy retrieval of trips associated with a driver.
  </li>

  <li>
    The hasTrips() function checks if the driver has any associated trips. This is useful for validation purposes, such as preventing deletion of a driver who has trips assigned.
  </li>
</ol>

<h3>Controller Structure</h3>
<p>The project utilizes Laravel framework to build a CRUD (Create, Read, Update, Delete) system. It consists of three main tables:</p>

<ol>
    <li><strong>DriversController:</strong> Manages CRUD operations for drivers.</li>
    <li><strong>VehiclesController:</strong> Manages CRUD operations for  vehicles.</li>
    <li><strong>TripsController:</strong> Manages CRUD operations for trips.</li>
</ol>

<h4>Reasons for Decisions</h4>

<ol>

  <li>
    Separating CRUD operations into different controllers follows the principle of single responsibility, making the codebase more maintainable and easier to understand
  </li>
</ol>


<h2>Functions in TripsController</h2>

<ol>
    <li><strong>index:</strong> Displays a list of trips.</li>
    <li><strong>create:</strong> Displays a form to create a new trip.</li>
    <li><strong>selectVehicle:</strong> Handles the selection of a vehicle based on the selected date.</li>
    <li><strong>selectDriver:</strong> Handles the selection of a driver based on the selected date and vehicle.</li>
    <li><strong>store:</strong> Stores the newly created trip.</li>
</ol>

<h4>Reasons</h4>
<ol>
    <li>The index, create, and store functions are standard CRUD operations for managing trips</li>
    <li>The selectVehicle function implements the first phase of trip reservation, allowing the user to select a date and then displaying only vehicles that do not have a trip scheduled on that date.</li>
    <li>The selectDriver function implements the second phase of trip reservation, allowing the user to select a driver whose license matches the selected vehicle and who does not have a trip scheduled on the selected date</li>
</ol>

<h2>Guarding Deletion of Drivers and Vehicles</h2>
<p>In the deleted function of both DriversController and VehiclesController, a guard clause was added to prevent deletion if the driver or vehicle has associated trips.</p>
<p>By guarding against deletion of drivers or vehicles with associated trips, data integrity is maintained, and potential errors are avoided</p>


 <h1>Installation Instructions</h1>

    
  <h2>Prerequisites</h2>
  <p>List of prerequisites required to run the application. For example:</p>
  <ul>
      <li>PHP (version)</li>
      <li>Composer</li>
      <li>MySQL or any other database system</li>
  </ul>

  <h2>Installation</h2>
    <ol>
      <li>
        <strong>Clone the repository:</strong><br>
            <code>git clone [repository_url]</code></li>
        <li><strong>Navigate to the project directory:</strong><br>
            <code>cd [project_directory]</code></li>
        <li><strong>Install Composer Dependencies:</strong><br>
            <code>composer install</code></li>
        <li><strong>Copy <code>.env.example</code> to <code>.env</code>:</strong><br>
            <code>cp .env.example .env</code></li>
        <li><strong>Generate Application Key:</strong><br>
            <code>php artisan key:generate</code></li>
        <li><strong>Configure your <code>.env</code> file:</strong><br>
            <ul>
                <li>Set your database credentials (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).</li>
                <li>Set any other configuration variables required by your application.</li>
            </ul>
        </li>
        <li><strong>Run Migrations:</strong><br>
            <code>php artisan migrate</code></li>
        <li><strong>Seed Database:</strong><br>
            If your application requires seeding the database with dummy data:<br>
            <code>php artisan db:seed</code></li>
        <li><strong>Start the Development Server:</strong><br>
            <code>php artisan serve</code></li>
        <li><strong>Access your application:</strong><br>
            Open your web browser and visit <code>http://localhost:8000</code> (or the URL where your application is served).</li>
    </ol>


