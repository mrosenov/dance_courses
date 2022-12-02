<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\SemestersCalendarModel;
use App\Models\StudiosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CoursesController extends Controller
{
    // Views
    public function index($semesterID,$studioID,$courseID,CoursesModel $courses) {
        $course = $courses::find($courseID);
        return view('admin.course.index', [
            'course' => $course,
        ]);
    }

    // Methods

    public function store($semesterID,$studioID,Request $request) {

        $this->validate($request, [
            'course_name' => 'required',
            'course_description' => 'required',
            'dance_style' => 'required',
            'course_teacher' => 'required',
            'course_ageGroup' => 'required',
            'course_level' => 'required',
            'course_places' => 'required',
            'course_price' => 'required',
            'course_weekday' => 'required',
            'course_start' => 'required',
            'course_end' => 'required',
            'registration_start' => 'required',
            'registration_end' => 'required',
        ]);

        $course = new CoursesModel();

        $course->name = $request->course_name;
        $course->description = $request->course_description;
        $course->semester = $semesterID;
        $course->studio = $studioID;
        $course->dance_style = $request->dance_style;
        $course->teacher = $request->course_teacher;
        $course->age_group = $request->course_ageGroup;
        $course->level = $request->course_level;
        $course->free_places = $request->course_places;
        $course->course_start = $request->course_start;
        $course->course_end = $request->course_end;
        $course->course_register_start = $request->registration_start;
        $course->course_register_end = $request->registration_end;
        $course->price = $request->course_price;
        $course->weekday = $request->course_weekday;
        $course->active = $request->active;
        $course->save();

        $calendar = new SemestersCalendarModel();

        $calendar->semester = $course->semester;
        $calendar->studio = $course->studio;
        $calendar->course = $course->id;
        $calendar->weekday = $course->weekday;
        $calendar->save();

        return redirect::back()->with('success', $course->name.' have been successfully added.');
    }

    public function update($semesterID,$studioID,$courseID,Request $request, CoursesModel $courses) {
        $this->validate($request, [
            'course_name' => 'required',
            'course_description' => 'required',
            'dance_style' => 'required',
            'course_teacher' => 'required',
            'course_ageGroup' => 'required',
            'course_level' => 'required',
            'course_places' => 'required',
            'course_price' => 'required',
            'course_weekday' => 'required',
            'course_start' => 'required',
            'course_end' => 'required',
            'registration_start' => 'required',
            'registration_end' => 'required',
        ]);

        $course = $courses->find($courseID);

        $course->name = $request->course_name;
        $course->description = $request->course_description;
        $course->semester = $request->course_semester;
        $course->studio = $request->course_studio;
        $course->dance_style = $request->dance_style;
        $course->teacher = $request->course_teacher;
        $course->age_group = $request->course_ageGroup;
        $course->level = $request->course_level;
        $course->free_places = $request->course_places;
        $course->course_start = $request->course_start;
        $course->course_end = $request->course_end;
        $course->course_register_start = $request->registration_start;
        $course->course_register_end = $request->registration_end;
        $course->price = $request->course_price;
        $course->weekday = $request->course_weekday;
        $course->active = $request->active;
        $course->update();

        return redirect::back()->with('success', $course->name.' have been successfully updated.');
    }

    public function destroy($semesterID,$studioID,$courseID, CoursesModel $courses) {
        $course = $courses->find($courseID);
        $course->delete();

        return redirect::back()->with('success', $course->name.' have been successfully deleted.');
    }
}
