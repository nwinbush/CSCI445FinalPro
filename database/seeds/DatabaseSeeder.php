<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\style;
use App\language;
use App\csClass;
use App\User;
use App\UserData;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(languageTableSeeder::class);
        $this->call(styleTableSeeder::class);
        $this->call(classTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(userDataTableSeeder::class);

        Model::reguard();
    }
}
class styleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('teamStyle')->delete();

        style::create(['style' => 'social']);
        style::create(['style' => 'competitive']);
        style::create(['style' => 'dontcare']);

    }
}

class languageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('languages')->delete();

        language::create(['language' => 'c']);
        language::create(['language' => 'java']);
        language::create(['language' => 'python']);

    }
}

class classTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('classes')->delete();

        csClass::create(['course_num' => '261']);
        csClass::create(['course_num' => '262']);
        csClass::create(['course_num' => '306']);
        csClass::create(['course_num' => '406']);

    }
}

class userTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create(['id' => '1','name' => 'Mickey,Mouse', 'email' => 'mmouse@mines.edu', 'password' => bcrypt('123978'), 'isAdmin' => true]);
        User::create(['id' => '2', 'name' => 'Donald,Duck', 'email' => 'dduck@mines.edu', 'password' => bcrypt('444321')]);
        User::create(['id' => '3', 'name' => 'Jane,Jetson', 'email' => 'jjetson@mines.edu', 'password' => bcrypt('999777')]);
        User::create(['id' => '4', 'name' => 'Frodo,Baggins', 'email' => 'fbaggins@mines.edu', 'password' => bcrypt('555123')]);
        User::create(['id' => '5', 'name' => 'Bilbo,Baggins', 'email' => 'bbaggins@mines.edu', 'password' => bcrypt('988777')]);
        User::create(['id' => '6', 'name' => 'Winnie,Poohbear', 'email' => 'pbear@mines.edu', 'password' => bcrypt('478234')]);
        User::create(['id' => '7', 'name' => 'Daffy,Duck', 'email' => 'daduck@mines.edu', 'password' => bcrypt('120978')]);
        User::create(['id' => '8', 'name' => 'Wile,Coyote', 'email' => 'wcoyote@mines.edu', 'password' => bcrypt('409123')]);
        User::create(['id' => '9', 'name' => 'Road,Runner', 'email' => 'rrunner@mines.edu', 'password' => bcrypt('128745')]);
        User::create(['id' => '10', 'name' => 'Marge,Simpson', 'email' => 'msimpson@mines.edu', 'password' => bcrypt('765120')]);
        User::create(['id' => '11', 'name' => 'Charlie,Brown', 'email' => 'cbrown@mines.edu', 'password' => bcrypt('876123')]);
        User::create(['id' => '12', 'name' => 'Lucy,VanPelt', 'email' => 'lvanpelt@mines.edu', 'password' => bcrypt('333221')]);
        User::create(['id' => '13', 'name' => 'Bugs,Bunny', 'email' => 'bbunny@mines.edu', 'password' => bcrypt('752412')]);
        User::create(['id' => '14', 'name' => 'Betty,Boop', 'email' => 'bboop@mines.edu', 'password' => bcrypt('532109')]);
        User::create(['id' => '15', 'name' => 'Lois,Griffin', 'email' => 'lgriffin@mines.edu', 'password' => bcrypt('223311')]);
        User::create(['id' => '16', 'name' => 'Wilma,Flintstone', 'email' => 'wflintstone@mines.edu', 'password' => bcrypt('443322')]);
        User::create(['id' => '17', 'name' => 'Fred,Flintstone', 'email' => 'fflintstone@mines.edu', 'password' => bcrypt('443311')]);
        User::create(['id' => '18', 'name' => 'Peppa,Pig', 'email' => 'ppig@mines.edu', 'password' => bcrypt('784512')]);
        User::create(['id' => '19', 'name' => 'Turanga,Leela', 'email' => 'leela@mines.edu', 'password' => bcrypt('834215')]);
        User::create(['id' => '20', 'name' => 'Sylvester,Cat', 'email' => 'scat@mines.edu', 'password' => bcrypt('920451')]);
        User::create(['id' => '21', 'name' => 'Felix,Cat', 'email' => 'fcat@mines.edu', 'password' => bcrypt('375621')]);
        User::create(['id' => '22', 'name' => 'Top,Cat', 'email' => 'tc@mines.edu', 'password' => bcrypt('781234')]);
        User::create(['id' => '23', 'name' => 'Scooby,Doo', 'email' => 'scooby@mines.edu', 'password' => bcrypt('392875')]);
        User::create(['id' => '24', 'name' => 'Porky,Pig', 'email' => 'porky@mines.edu', 'password' => bcrypt('123654')]);
        User::create(['id' => '25', 'name' => 'Garfield,Cat', 'email' => 'garfield@mines.edu', 'password' => bcrypt('387612')]);
        User::create(['id' => '26', 'name' => 'Peter,Pan', 'email' => 'pan@mines.edu', 'password' => bcrypt('982765')]);
        User::create(['id' => '27', 'name' => 'Foghorn,Leghorn', 'email' => 'fleghorn@mines.edu', 'password' => bcrypt('762341')]);
        User::create(['id' => '28', 'name' => 'Manning, Peyton', 'email' => 'pmanning@mines.edu', 'password' => bcrypt('772233')]);
        User::create(['id' => '29', 'name' => 'Green,Virgil', 'email' => 'vgreen@mines.edu', 'password' => bcrypt('123456')]);
        User::create(['id' => '30', 'name' => 'Thomas, Julias', 'email' => 'jthomas@mines.edu', 'password' => bcrypt('123457')]);
        User::create(['id' => '31', 'name' => 'Sanders, Emmanuel', 'email' => 'esanders@mines.edu', 'password' => bcrypt('123458')]);
        User::create(['id' => '32', 'name' => 'Tamme, Jason', 'email' => 'jtamme@mines.edu', 'password' => bcrypt('123569')]);
        User::create(['id' => '33', 'name' => 'Knighton, Terrance', 'email' => 'tk@mines.edu', 'password' => bcrypt('123450')]);
        User::create(['id' => '34', 'name' => 'Colquitt, Britton', 'email' => 'bcol@mines.edu', 'password' => bcrypt('98765')]);
        User::create(['id' => '35', 'name' => 'Roby, Bradley', 'email' => 'broby@mines.edu', 'password' => bcrypt('98764')]);
        User::create(['id' => '36', 'name' => 'Ward, T.J.', 'email' => 'tjward@mines.edu', 'password' => bcrypt('98763')]);
        User::create(['id' => '37', 'name' => 'Ware, DeMarcus', 'email' => 'dware@mines.edu', 'password' => bcrypt('98762')]);
        User::create(['id' => '38', 'name' => 'Webster, Kayvon', 'email' => 'kw@mines.edu', 'password' => bcrypt('98761')]);
    }
}

class userDataTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('UserData')->delete();

        UserData::create(['id' => '1', 'name' => 'Mickey Mouse', 'isAdmin' => true]);
        UserData::create(['id' => '2', 'name' => 'Donald Duck', 'team_style' => 'social', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '3', 'name' => 'Jane Jetson', 'team_style' => 'social', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '4', 'name' => 'Frodo Baggins', 'team_style' => 'social', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '5', 'name' => 'Bilbo Baggins', 'team_style' => 'social', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '6', 'name' => 'Winnie Poohbear', 'team_style' => 'social', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '7', 'name' => 'Daffy Duck', 'team_style' => 'social', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '8', 'name' => 'Wile Coyote', 'team_style' => 'social', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '9', 'name' => 'Road Runner', 'team_style' => 'social', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '10', 'name' => 'Marge Simpson', 'team_style' => 'social', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '11', 'name' => 'Charlie Brown', 'team_style' => 'social', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '12', 'name' => 'Lucy VanPelt', 'team_style' => 'social', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '13', 'name' => 'Bugs Bunny', 'team_style' => 'social', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '14', 'name' => 'Betty Boop', 'team_style' => 'competitive', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '15', 'name' => 'Lois Griffin', 'team_style' => 'competitive', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '16', 'name' => 'Wilma Flintstone', 'team_style' => 'competitive', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '17', 'name' => 'Fred Flintstone', 'team_style' => 'competitive', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '18', 'name' => 'Peppa Pig', 'team_style' => 'competitive', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '19', 'name' => 'Turanga Leela', 'team_style' => 'competitive', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '20', 'name' => 'Sylvester Cat', 'team_style' => 'competitive', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '21', 'name' => 'Felix Cat', 'team_style' => 'competitive', 'taken_programming_class' =>'306']);
        UserData::create(['id' => '22', 'name' => 'Top Cat', 'team_style' => 'competitive', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '23', 'name' => 'Scooby Doo', 'team_style' => 'competitive', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '24', 'name' => 'Porky Pig', 'team_style' => 'competitive', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '25', 'name' => 'Garfield Cat', 'team_style' => 'competitive', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '26', 'name' => 'Peter Pan', 'team_style' => 'competitive', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '27', 'name' => 'Foghorn Leghorn', 'team_style' => 'competitive', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '28', 'name' => 'Manning Peyton', 'team_style' => 'competitive', 'taken_programming_class' =>'261']);
        UserData::create(['id' => '29', 'name' => 'Green Virgil', 'team_style' => 'competitive', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '30', 'name' => 'Thomas Julias', 'team_style' => 'competitive', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '31', 'name' => 'Sanders Emmanuel', 'team_style' => 'competitive', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '32', 'name' => 'Tamme Jason', 'team_style' => 'competitive', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '33', 'name' => 'Knighton Terrance', 'team_style' => 'competitive', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '34', 'name' => 'Colquitt Britton', 'team_style' => 'competitive', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '35', 'name' => 'Roby Bradley', 'team_style' => 'dontcare', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '36', 'name' => 'Ward T.J.', 'team_style' => 'dontcare', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '37', 'name' => 'Ware DeMarcus', 'team_style' => 'dontcare', 'taken_programming_class' =>'262']);
        UserData::create(['id' => '38', 'name' => 'Webster, Kayvon', 'team_style' => 'dontcare', 'taken_programming_class' =>'262']);
    }
}