<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;
class VotablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users  = User::all();
        $numberofUsers = $users->count();
        $votes = [-1, 1];
        
        foreach (Question::all() as $question) 
    	{
	    	for($i = 0; $i < rand(1, $numberofUsers); $i++)
	    	{
	    		$user = $users[$i];
	    		$user->voteQuestion($question, $votes[rand(0,1)]);
	    	}
   		}
    }
}
