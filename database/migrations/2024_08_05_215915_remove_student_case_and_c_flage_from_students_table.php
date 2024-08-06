<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveStudentCaseAndCFlageFromStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('student_case');
            $table->dropColumn('c_flage');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('student_case');
            $table->boolean('c_flage');
        });
    }
}
