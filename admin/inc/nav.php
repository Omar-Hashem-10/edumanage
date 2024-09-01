<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Students Section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Students</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Courses:</h6>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse1" aria-expanded="false">
                    Arabic Language
                </a>
                <div id="collapseCourse1" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 1 ?>">First Year</a>
                    <a class="collapse-item" href="students_group.php?id=<?= 6 ?>">Second Year</a>
                    <a class="collapse-item" href="students_group.php?id=<?= 10 ?>">Third Year</a>
                    <a class="collapse-item" href="students_group.php?id=<?= 12 ?>">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse2" aria-expanded="false">
                    Geography
                </a>
                <div id="collapseCourse2" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 2 ?>">First Year</a>
                    <a class="collapse-item" href="students_group.php?id=<?= 14 ?>">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse3" aria-expanded="false">
                    Chemistry
                </a>
                <div id="collapseCourse3" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 3 ?>">First Year</a>
                    <a class="collapse-item" href="students_group.php?id=<?= 15 ?>">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse4" aria-expanded="false">
                    Physics
                </a>
                <div id="collapseCourse4" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 4 ?>">First Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse5" aria-expanded="false">
                    English Language
                </a>
                <div id="collapseCourse5" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 5 ?>">First Year</a>
                    <a class="collapse-item" href="students_group.php?id=<?= 11 ?>">Third Year</a>
                    <a class="collapse-item" href="students_group.php?id=<?= 13 ?>">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse6" aria-expanded="false">
                    French Language
                </a>
                <div id="collapseCourse6" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 7 ?>">Second Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse7" aria-expanded="false">
                    Science
                </a>
                <div id="collapseCourse7" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 8 ?>">Third Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse8" aria-expanded="false">
                    Social Studies
                </a>
                <div id="collapseCourse8" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 9 ?>">Third Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse9" aria-expanded="false">
                    Biology
                </a>
                <div id="collapseCourse9" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 16 ?>">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseCourse10" aria-expanded="false">
                    Mathematics
                </a>
                <div id="collapseCourse10" class="collapse">
                    <a class="collapse-item" href="students_group.php?id=<?= 17 ?>">Fourth Year</a>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLectures" aria-expanded="true" aria-controls="collapseLectures">
        <i class="fas fa-fw fa-chalkboard-teacher"></i>
        <span>Lectures</span>
    </a>
    <div id="collapseLectures" class="collapse" aria-labelledby="headingLectures" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="add_lecture.php">Add Lecture</a>
            <!-- Courses list -->
            <a class="collapse-item" data-toggle="collapse" href="#collapseCourses" aria-expanded="false">
                View Lectures
            </a>
            <div id="collapseCourses" class="collapse">
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture1" aria-expanded="false">
                    Arabic Language
                </a>
                <div id="collapseLecture1" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=1">First Year</a>
                    <a class="collapse-item" href="view_lecture.php?id=6">Second Year</a>
                    <a class="collapse-item" href="view_lecture.php?id=10">Third Year</a>
                    <a class="collapse-item" href="view_lecture.php?id=12">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture2" aria-expanded="false">
                    Geography
                </a>
                <div id="collapseLecture2" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=2">First Year</a>
                    <a class="collapse-item" href="view_lecture.php?id=14">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture3" aria-expanded="false">
                    Chemistry
                </a>
                <div id="collapseLecture3" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=3">First Year</a>
                    <a class="collapse-item" href="view_lecture.php?id=15">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture4" aria-expanded="false">
                    Physics
                </a>
                <div id="collapseLecture4" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=4">First Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture5" aria-expanded="false">
                    English Language
                </a>
                <div id="collapseLecture5" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=5">First Year</a>
                    <a class="collapse-item" href="view_lecture.php?id=11">Third Year</a>
                    <a class="collapse-item" href="view_lecture.php?id=13">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture6" aria-expanded="false">
                    French Language
                </a>
                <div id="collapseLecture6" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=7">Second Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture7" aria-expanded="false">
                    Science
                </a>
                <div id="collapseLecture7" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=8">Third Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture8" aria-expanded="false">
                    Social Studies
                </a>
                <div id="collapseLecture8" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=9">Third Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture9" aria-expanded="false">
                    Biology
                </a>
                <div id="collapseLecture9" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=16">Fourth Year</a>
                </div>
                <a class="collapse-item" data-toggle="collapse" href="#collapseLecture10" aria-expanded="false">
                    Mathematics
                </a>
                <div id="collapseLecture10" class="collapse">
                    <a class="collapse-item" href="view_lecture.php?id=17">Fourth Year</a>
                </div>
            </div>

        </div>
    </div>
</li>



    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAssignments" aria-expanded="true" aria-controls="collapseAssignments">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Assignments</span>
    </a>
    <div id="collapseAssignments" class="collapse" aria-labelledby="headingAssignments" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Courses:</h6>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment1" aria-expanded="false">
                Arabic Language
            </a>
            <div id="collapseAssignment1" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 1 ?>">First Year</a>
                <a class="collapse-item" href="assignments_group.php?id=<?= 6 ?>">Second Year</a>
                <a class="collapse-item" href="assignments_group.php?id=<?= 10 ?>">Third Year</a>
                <a class="collapse-item" href="assignments_group.php?id=<?= 12 ?>">Fourth Year</a>
            </div>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment2" aria-expanded="false">
                Geography
            </a>
            <div id="collapseAssignment2" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 2 ?>">First Year</a>
                <a class="collapse-item" href="assignments_group.php?id=<?= 14 ?>">Fourth Year</a>
            </div>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment3" aria-expanded="false">
                Chemistry
            </a>
            <div id="collapseAssignment3" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 3 ?>">First Year</a>
                <a class="collapse-item" href="assignments_group.php?id=<?= 15 ?>">Fourth Year</a>
            </div>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment4" aria-expanded="false">
                Physics
            </a>
            <div id="collapseAssignment4" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 4 ?>">First Year</a>
            </div>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment5" aria-expanded="false">
                English Language
            </a>
            <div id="collapseAssignment5" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 5 ?>">First Year</a>
                <a class="collapse-item" href="assignments_group.php?id=<?= 11 ?>">Third Year</a>
                <a class="collapse-item" href="assignments_group.php?id=<?= 13 ?>">Fourth Year</a>
            </div>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment6" aria-expanded="false">
                French Language
            </a>
            <div id="collapseAssignment6" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 7 ?>">Second Year</a>
            </div>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment7" aria-expanded="false">
                Science
            </a>
            <div id="collapseAssignment7" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 8 ?>">Third Year</a>
            </div>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment8" aria-expanded="false">
                Social Studies
            </a>
            <div id="collapseAssignment8" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 9 ?>">Third Year</a>
            </div>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment9" aria-expanded="false">
                Biology
            </a>
            <div id="collapseAssignment9" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 16 ?>">Fourth Year</a>
            </div>
            <a class="collapse-item" data-toggle="collapse" href="#collapseAssignment10" aria-expanded="false">
                Mathematics
            </a>
            <div id="collapseAssignment10" class="collapse">
                <a class="collapse-item" href="assignments_group.php?id=<?= 17 ?>">Fourth Year</a>
            </div>
        </div>
    </div>
</li>

<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExams" aria-expanded="true" aria-controls="collapseExams">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Exams</span>
                </a>
                <div id="collapseExams" class="collapse" aria-labelledby="headingExams" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Exams:</h6>

                        <!-- Create Exam Section -->
                        <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam" aria-expanded="false">
                            Create Exam
                        </a>
                        <div id="collapseCreateExam" class="collapse">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Courses:</h6>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam1" aria-expanded="false">
                                    Arabic Language
                                </a>
                                <div id="collapseCreateExam1" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=1">First Year</a>
                                    <a class="collapse-item" href="add_exam.php?id=6">Second Year</a>
                                    <a class="collapse-item" href="add_exam.php?id=10">Third Year</a>
                                    <a class="collapse-item" href="add_exam.php?id=12">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam2" aria-expanded="false">
                                    Geography
                                </a>
                                <div id="collapseCreateExam2" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=2">First Year</a>
                                    <a class="collapse-item" href="add_exam.php?id=14">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam3" aria-expanded="false">
                                    Chemistry
                                </a>
                                <div id="collapseCreateExam3" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=3">First Year</a>
                                    <a class="collapse-item" href="add_exam.php?id=15">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam4" aria-expanded="false">
                                    Physics
                                </a>
                                <div id="collapseCreateExam4" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=4">First Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam5" aria-expanded="false">
                                    English Language
                                </a>
                                <div id="collapseCreateExam5" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=5">First Year</a>
                                    <a class="collapse-item" href="add_exam.php?id=11">Third Year</a>
                                    <a class="collapse-item" href="add_exam.php?id=13">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam6" aria-expanded="false">
                                    French Language
                                </a>
                                <div id="collapseCreateExam6" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=7">Second Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam7" aria-expanded="false">
                                    Science
                                </a>
                                <div id="collapseCreateExam7" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=8">Third Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam8" aria-expanded="false">
                                    Social Studies
                                </a>
                                <div id="collapseCreateExam8" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=9">Third Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam9" aria-expanded="false">
                                    Biology
                                </a>
                                <div id="collapseCreateExam9" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=16">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseCreateExam10" aria-expanded="false">
                                    Mathematics
                                </a>
                                <div id="collapseCreateExam10" class="collapse">
                                    <a class="collapse-item" href="add_exam.php?id=17">Fourth Year</a>
                                </div>
                            </div>
                        </div>

                        <!-- View Exam Section -->
                        <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam" aria-expanded="false">
                            View Exam
                        </a>
                        <div id="collapseViewExam" class="collapse">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Courses:</h6>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam1" aria-expanded="false">
                                    Arabic Language
                                </a>
                                <div id="collapseViewExam1" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=1">First Year</a>
                                    <a class="collapse-item" href="view_exam.php?id=6">Second Year</a>
                                    <a class="collapse-item" href="view_exam.php?id=10">Third Year</a>
                                    <a class="collapse-item" href="view_exam.php?id=12">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam2" aria-expanded="false">
                                    Geography
                                </a>
                                <div id="collapseViewExam2" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=2">First Year</a>
                                    <a class="collapse-item" href="view_exam.php?id=14">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam3" aria-expanded="false">
                                    Chemistry
                                </a>
                                <div id="collapseViewExam3" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=3">First Year</a>
                                    <a class="collapse-item" href="view_exam.php?id=15">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam4" aria-expanded="false">
                                    Physics
                                </a>
                                <div id="collapseViewExam4" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=4">First Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam5" aria-expanded="false">
                                    English Language
                                </a>
                                <div id="collapseViewExam5" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=5">First Year</a>
                                    <a class="collapse-item" href="view_exam.php?id=11">Third Year</a>
                                    <a class="collapse-item" href="view_exam.php?id=13">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam6" aria-expanded="false">
                                    French Language
                                </a>
                                <div id="collapseViewExam6" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=7">Second Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam7" aria-expanded="false">
                                    Science
                                </a>
                                <div id="collapseViewExam7" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=8">Third Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam8" aria-expanded="false">
                                    Social Studies
                                </a>
                                <div id="collapseViewExam8" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=9">Third Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam9" aria-expanded="false">
                                    Biology
                                </a>
                                <div id="collapseViewExam9" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=16">Fourth Year</a>
                                </div>
                                <a class="collapse-item" data-toggle="collapse" href="#collapseViewExam10" aria-expanded="false">
                                    Mathematics
                                </a>
                                <div id="collapseViewExam10" class="collapse">
                                    <a class="collapse-item" href="view_exam.php?id=17">Fourth Year</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

<!-- Support Section -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupport" aria-expanded="true" aria-controls="collapseSupport">
        <i class="fas fa-fw fa-headset"></i>
        <span>Support</span>
    </a>
    <div id="collapseSupport" class="collapse" aria-labelledby="headingSupport" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Support:</h6>
            <a class="collapse-item" href="view_support.php">View Support Requests</a>
        </div>
    </div>
</li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>
