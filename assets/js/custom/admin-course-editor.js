var btn_publish = document.querySelector("#btn-publish");
var btn_save = document.querySelector("#btn-save");
var btn_add_lesson = document.querySelector('#btn-add-lesson');
var btn_add_package = document.querySelector('#btn-add-package');
var btn_add_branch = document.querySelector('#btn-add-branch');
var btn_add_class = document.querySelector('#btn-add-class');
var btn_add_teacher = document.querySelector('#btn-add-teacher');

btn_publish.addEventListener("click", onClickPublish);
btn_save.addEventListener("click", onClickSave);
btn_add_lesson.addEventListener('click', onClickLesson);
btn_add_package.addEventListener('click', onClickPackage);
btn_add_branch.addEventListener('click', onClickBranch);
btn_add_class.addEventListener('click', onClickClass);
btn_add_teacher.addEventListener('click', onClickTeacher);

var pageTitle = document.querySelector('#pageTitle');
var inputs = {
    title: document.querySelector('#cTitle'),
    content: document.querySelector('#cContent'),
    description: document.querySelector("#cDescription").querySelector("div").querySelector("p"),
    lessons: document.querySelector('#cLessons'),
    packages: document.querySelector('#cPackages'),
    branches: document.querySelector('#cBranches'),
    classes: document.querySelector('#cClasses'),
    thumb: document.querySelector('#cThumb'),
    thumbnail: document.querySelector('#cThumbnail'),
    thumbnail2: document.querySelector('#cThumbnail2'),
    picture: document.querySelector('#cPicture'),
    picture2: document.querySelector('#cPicture2'),
    pictures: document.querySelector('#cPictures'),
    teachers: document.querySelector('#cTeachers'),
    category: document.querySelector('#cCategory'),
    startDate: document.querySelector('#cStartDate'),
    endDate: document.querySelector('#cEndDate'),
    lineGroup: document.querySelector('#cLineGroup'),
    editedDate: document.querySelector('#cEditedDate'),
    preview: document.querySelector('#cPreview'),
    recommended: document.querySelector('#cRecommended')
};

var data = {
    basic: JSON.parse(document.querySelector('#obj-basic').innerHTML),
    course: JSON.parse(document.querySelector("#obj-course").innerHTML),
    urls: JSON.parse(document.querySelector("#obj-urls").innerHTML)
};

var db = Connect();

let name = {
    basic: 'basic',
    course: 'course'
};

//////////
$('#loading').toggle(false);
initData();
//////////

async function initData() {
    var basic = await db.getObject(name.basic);
    var course = await db.getObject(name.course);
    console.log('basic', basic);
    if (basic != null) {
        if (data.basic.isNew) {
            data.basic = basic;
            data.course = course;
        } else {
            if (data.course.ID == course.ID) {
                data.basic = basic;
                data.course = course;
                console.log('ID SAME');
            } else {
                data.course.meta = 'edit';
                await db.setObject(name.basic, data.basic);
                await db.setObject(name.course, data.course);
            }
        }
    } else {
        if (data.basic.isNew) {
            data.course.ID = await db.genID();
            data.course.meta = 'add';
        } else {
            data.course.meta = 'edit';
        }
        await db.setObject(name.basic, data.basic);
        await db.setObject(name.course, data.course);
    }

    if (!data.basic.isNew) {
        let public = Boolean(Number(data.course.public));
        if (public) {
            btn_publish.classList.add('btn-secondary');
            btn_publish.innerHTML = "UNPUBLISH";
        } else {
            btn_publish.classList.add('btn-success');
            btn_publish.innerHTML = "PUBLISH";
        }
    } else {
        btn_publish.classList.add('btn-success');
        btn_publish.innerHTML = "PUBLISH";
    }

    pageTitle.innerHTML = data.course.title;
    inputs.title.value = data.course.title;
    inputs.content.value = data.course.content;
    inputs.description.innerHTML = data.course.description;
    inputs.category.value = data.course.categoryID;
    inputs.thumb.src = data.course.thumbnail;
    inputs.thumbnail2.value = data.course.thumbnail;
    inputs.preview.value = data.course.preview;
    inputs.startDate.value = data.course.startDate;
    inputs.endDate.value = data.course.endDate;
    inputs.lineGroup.value = data.course.lineGroup;
    inputs.editedDate.innerHTML = data.course.editedDate;
    inputs.recommended.value = data.course.recommended;

    initLessonItems(inputs.lessons, data.course.lessons);
    initPackageItems(inputs.packages, data.course.packages);
    initBranchItems(inputs.branches, data.course.branches);
    initTeacherItems(inputs.teachers, data.course.teachers);
    initClassItems(inputs.classes, data.course.classes);
    initPictureItems(inputs.pictures, data.course.pictures);
}

async function saveSess() {
    data.course.title = await inputs.title.value;
    data.course.content = await inputs.content.value;
    data.course.description = await inputs.description.innerHTML;
    data.course.thumbnail = await inputs.thumbnail2.value;
    data.course.preview = await inputs.preview.value;
    data.course.startDate = await inputs.startDate.value;
    data.course.endDate = await inputs.endDate.value;
    data.course.lineGroup = await inputs.lineGroup.value;
    data.course.categoryID = await inputs.category.value;
    data.course.recommended = await inputs.recommended.value;
    await db.setObject(name.course, data.course);
}

async function onClickLesson() {
    await saveSess();
    window.location.href = data.urls.pageAdminCourseEditorLesson;
}

async function onClickPackage() {
    await saveSess();
    window.location.href = data.urls.pageAdminCourseEditorPackage;
}

async function onClickBranch() {
    await saveSess();
    window.location.href = data.urls.pageAdminCourseEditorBranch;
}

async function onClickClass() {
    await saveSess();
    window.location.href = data.urls.pageAdminCourseEditorClass;
}

async function onClickTeacher() {
    await saveSess();
    window.location.href = data.urls.pageAdminCourseEditorTeacher;
}

async function onUploadToPicture(input, width, height, input_id) {
    let base64 = await uploadToBase64(input, width, height);
    document.querySelector(input_id).value = base64;

    let id = await db.genID();
    let picture = {
        ID: id,
        picture: base64,
        meta: 'add'
    };

    data.course.pictures.push(picture);

    await db.setObject(name.course, data.course);

    initPictureItems(inputs.pictures, data.course.pictures)
}

async function onPreviewChange(input, id) {
    iframe = document.querySelector(id);
    let value = input.value;
    iframe.src = "https://www.youtube.com/embed/" + value;
}

function initLessonItems(input, lessons) {
    input.innerHTML = "";
    lessons.forEach((element, index) => {
        try {
            let id = element.ID;
            if (element.thumbnail == '') element.thumbnail = data.urls.def_thumb;
            if (element.meta == 'delete') {
            } else {
                let item =
                    '<li class="nestable-item nestable-item-handle" data-id="' + id + '" data-i="' + index + '">' +
                    '<div class="nestable-handle"><i class="material-icons">menu</i></div>' +
                    '<div class="nestable-content">' +
                    '<div class="media align-items-center">' +
                    '<div class="media-body">' +
                    '<h5 class="card-title h6 mb-0">' +
                    '<a href="' + data.urls.pageAdminCourseEditorLesson + '?id=' + id + '">' + element.title + '</a>' +
                    '</h5>' +
                    '<small class="text-muted">' + element.content + '</small>' +
                    '</div>' +
                    '<div class="media-right">' +
                    '<a onclick="return confirmDeleteLesson(' + id + ');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>' +
                    '<!-- <a href="' + data.urls.pageAdminCourseEditorLesson + '?id=' + id + '" class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a> -->' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>';
                input.innerHTML = input.innerHTML + item;
            }
        } catch (e) {
            console.log('err', e);
        }
    });
}

function initPackageItems(input, packages) {
    input.innerHTML = "";
    console.log(packages);
    packages.forEach((element, index) => {
        try {
            let id = element.ID;
            if (element.meta == 'delete') {
            } else {
                let item =
                    '<li class="nestable-item nestable-item-handle" data-id="' + id + '" data-i="' + index + '">' +
                    '<div class="nestable-handle"><i class="material-icons">menu</i></div>' +
                    '<div class="nestable-content">' +
                    '<div class="media align-items-center">' +
                    '<div class="media-left">' +
                    '<label> ชื่อแพคเกจราคา' +
                    '<input type="text" id="duration" class="form-control" placeholder="Price" value="' + element.title + '" readonly>' +
                    '</label>' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<label> จำนวนเครดิต (ชม.)' +
                    '<input type="text" id="duration" class="form-control" placeholder="No. of Hours" value="' + element.credit + '" readonly>' +
                    '</label>' +
                    '</div>' +
                    '<div class="media-right">' +
                    '<a onclick="return editPackage(' + index + ');" class="btn btn-white btn-sm"><i class="material-icons">create</i></a>' +
                    '<a onclick="return confirmDeletePackage(' + id + ');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>';
                input.innerHTML = input.innerHTML + item;
            }
        } catch (e) {
            console.log('err', e);
        }
    });
}

function initBranchItems(input, branches) {
    input.innerHTML = "";
    branches.forEach((element, index) => {
        try {
            let id = element.ID;
            let branch = element.branch;
            if (branch.thumbnail == '') branch.thumbnail = data.urls.def_thumb;
            if (element.meta == 'delete') {
            } else {
                let item =
                    '<li class="nestable-item nestable-item-handle" data-id="' + id + '" data-i="' + index + '">' +
                    '<div class="nestable-handle"><i class="material-icons">menu</i></div>' +
                    '<div class="nestable-content">' +
                    '<div class="media align-items-center">' +
                    '<div class="media-left">' +
                    '<img src="' + branch.thumbnail + '" alt="" width="100" class="rounded">' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<h5 class="card-title h6 mb-0">' +
                    '<a href="' + data.urls.pageAdminCourseEditorBranch + '?id=' + id + '">' + branch.title + '</a>' +
                    '</h5>' +
                    '<small class="text-muted">updated 1 month ago</small>' +
                    '</div>' +
                    '<div class="media-right">' +
                    '<a onclick="return confirmDeleteBranch(' + id + ');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>';
                input.innerHTML = input.innerHTML + item;
            }
        } catch (e) {
            console.log('err', e);
        }
    });
}

function initTeacherItems(input, teachers) {
    input.innerHTML = "";
    teachers.forEach(element => {
        try {
            let id = element.ID;
            var teacher = element.teacher;
            if (teacher.profile_pic == '') teacher.profile_pic = data.urls.def_user;
            if (element.meta == 'delete') {
            } else {
                let item =
                    '<tr>' +
                    '<td>' +
                    '<div class="media align-items-center">' +
                    '<div class="avatar avatar-sm mr-3">' +
                    '<img src="' + teacher.profile_pic + '" alt="' + teacher.username + '" class="avatar-img rounded-circle">' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<span class="js-lists-values-employee-name">' + teacher.username + '</span>' +
                    '</div>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<a onclick="return confirmDeleteTeacher(' + id + ');" class="btn btn-white btn-sm">' +
                    '<i class="material-icons">delete_forever</i>' +
                    '</a>' +
                    '</td>' +
                    '</tr>';
                input.innerHTML = input.innerHTML + item;
            }
        } catch (e) {
            console.log('err', e);
        }
    });
}

function initClassItems(input, classes) {
    const courseID = data.course.ID;
    input.innerHTML = "";
    classes.forEach((element, index) => {
        try {
            let id = element.ID;
            if (element.meta == 'delete') {
            } else {
                let item =
                    '<li class="nestable-item nestable-item-handle" data-id="' + id + '" data-i="' + index + '">' +
                    '<div class="nestable-handle"><i class="material-icons">menu</i></div>' +
                    '<div class="nestable-content">' +
                    '<div class="media align-items-center">' +
                    '<div class="media-left">' +
                    '<span class="js-lists-values-employee-name">' + element.day + '</span>' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<h5 class="card-title h6 mb-0">' +
                    simpleTime(element.startTime) + " ถึง " + simpleTime(element.endTime) +
                    '</h5>' +
                    '<small class="text-muted">' + findBranchTitle(element.courseBranchID, data.course.branches) + '</small>' +
                    '</div>' +
                    '<div class="media-right">' +
                    '<a onclick="return editClass(' + index + ', ' + courseID + ');" class="btn btn-white btn-sm"><i class="material-icons">create</i></a>' +
                    '<a onclick="return confirmDeleteClass(' + id + ');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>';

                input.innerHTML = input.innerHTML + item;
            }
        } catch (e) {
            console.log('err', e);
        }
    });
}

function simpleTime(time) {
    let x = time.split(":");
    return x[0] + ":" + x[1];
}

function findBranchTitle(id, branches) {
    var title = "";

    branches.forEach(element => {
        if (id == element.ID) title = element.branch.title;
    });

    return title;
}

function initPictureItems(input, pictures) {
    input.innerHTML = "";
    pictures.forEach(element => {
        try {
            let id = element.ID;
            if (element.picture == '') element.picture = data.urls.def_thumb;
            if (element.meta == 'delete') {
            } else {
                let item =
                    '<li class="nestable-item nestable-item-handle" data-id="' + id + '">' +
                    '<div class="nestable-handle"><i class="material-icons">menu</i></div>' +
                    '<div class="nestable-content">' +
                    '<div class="media align-items-center">' +
                    '<div class="media-body">' +
                    '<p><img src="' + element.picture + '" alt="" width="100" class="rounded"></p>' +
                    '</div>' +
                    '<div class="media-right">' +
                    '<a onclick="return confirmDeletePicture(' + id + ');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>';
                input.innerHTML = input.innerHTML + item;
            }
        } catch (e) {
            console.log('err', e);
        }
    });
}

async function confirmDeleteLesson(id) {
    if (confirm('คุณต้องการลบ item นี้ใช่หรือไม่')) {
        data.course.lessons.forEach(async function (element, index) {
            if (element.ID == id) {
                if (element.meta == 'add') await data.course.lessons.splice(index, 1);
                else element.meta = 'delete';
            }
        });

        await db.setObject(name.course, data.course);

        initLessonItems(inputs.lessons, data.course.lessons);
    }
}

async function editPackage(index) {
    await saveSess();
    window.location.href = data.urls.pageAdminCourseEditorPackage + "?index=" + index;
}


async function editClass(index, id) {
    await saveSess();
    window.location.href = data.urls.pageAdminCourseEditorClass + "?index=" + index + "&id=" + id;
}

async function confirmDeletePackage(id) {
    if (confirm('คุณต้องการลบ item นี้ใช่หรือไม่')) {
        data.course.packages.forEach(async function (element, index) {
            if (element.ID == id) {
                if (element.meta == 'add') await data.course.packages.splice(index, 1);
                else element.meta = 'delete';
            }
        });

        await db.setObject(name.course, data.course);

        initPackageItems(inputs.packages, data.course.packages);
    }
}

async function confirmDeleteBranch(id) {
    if (confirm('คุณต้องการลบ item นี้ใช่หรือไม่')) {
        data.course.branches.forEach(async function (element, index) {
            if (element.ID == id) {
                if (element.meta == 'add') await data.course.branches.splice(index, 1);
                else element.meta = 'delete';
            }
        });

        await db.setObject(name.course, data.course);

        initBranchItems(inputs.branches, data.course.branches);
    }
}

async function confirmDeleteTeacher(id) {
    if (confirm('คุณต้องการลบ item นี้ใช่หรือไม่')) {
        data.course.teachers.forEach(async function (element, index) {
            if (element.ID == id) {
                if (element.meta == 'add') await data.course.teachers.splice(index, 1);
                else element.meta = 'delete';
            }
        });

        await db.setObject(name.course, data.course);

        initTeacherItems(inputs.teachers, data.course.teachers);
    }
}

async function confirmDeleteClass(id) {
    if (confirm('คุณต้องการลบ item นี้ใช่หรือไม่')) {
        data.course.classes.forEach(async function (element, index) {
            if (element.ID == id) {
                if (element.meta == 'add') await data.course.classes.splice(index, 1);
                else element.meta = 'delete';
            }
        });

        await db.setObject(name.course, data.course);

        initClassItems(inputs.classes, data.course.classes);
    }
}

async function confirmDeletePicture(id) {
    if (confirm('คุณต้องการลบ item นี้ใช่หรือไม่')) {
        data.course.pictures.forEach(async function (element, index) {
            if (element.ID == id) {
                if (element.meta == 'add') await data.course.pictures.splice(index, 1);
                else element.meta = 'delete';
            }
        });

        await db.setObject(name.course, data.course);

        initPictureItems(inputs.pictures, data.course.pictures);
    }
}

function onClickPublish() {
    let public = Boolean(Number(data.course.public));
    if (public) data.course.public = 0;
    else data.course.public = 1;

    save();
}

function onClickSave() {
    save();
}

async function save() {
    var progress = document.querySelector('#loading').querySelector('div');

    $('#loading').toggle(true);
    $('#page').toggle(false);

    var course = await Object.assign(data.course, {});

    // ---0%
    await saveSess(); //save basic content
    await updateProgress(progress, 0);

    // ---5%
    let teachers = course.teachers; await delete course.teachers;
    let branches = course.branches; await delete course.branches;
    let classes = course.classes; await delete course.classes;
    let lessons = course.lessons; await delete course.lessons;
    let packages = course.packages; await delete course.packages;
    let pictures = course.pictures; await delete course.pictures;
    await updateProgress(progress, 5);

    // ---10%
    var maxPrice = 0;
    packages.forEach((p, i) => {
        let price = Number(p.price);
        if (maxPrice < price) {
            maxPrice = price;
            course.maxPrice = maxPrice;
        }
    });
    var minPrice = maxPrice;
    packages.forEach((p, i) => {
        let price = Number(p.price);
        if (minPrice > price) {
            minPrice = price;
            course.minPrice = minPrice;
        }
    });
    await updateProgress(progress, 10);

    let lessonsL = document.querySelector('#cLessons').querySelectorAll('li');
    let packagesL = document.querySelector('#cPackages').querySelectorAll('li');
    let branchesL = document.querySelector('#cBranches').querySelectorAll('li');
    let classesL = document.querySelector('#cClasses').querySelectorAll('li');
    lessonsL.forEach((value, index) => {
        const i = Number(value.dataset.i);

        lessons[i].i = index;
        if (lessons[i].meta != "add" || lessons[i].meta != "delete") {
            lessons[i].meta = "edit";
        }

    });
    packagesL.forEach((value, index) => {
        const i = Number(value.dataset.i);

        console.log(i, packages[i]);
        packages[i].i = index;
        if (packages[i].meta != "add" || packages[i].meta != "delete") {
            packages[i].meta = "edit";
        }

    });
    branchesL.forEach((value, index) => {
        const i = Number(value.dataset.i);

        branches[i].i = index;
        if (branches[i].meta != "add" || branches[i].meta != "delete") {
            branches[i].meta = "edit";
        }

    });
    classesL.forEach((value, index) => {
        const i = Number(value.dataset.i);

        classes[i].i = index;
        if (classes[i].meta != "add" || classes[i].meta != "delete") {
            classes[i].meta = "edit";
        }

    });
    await updateProgress(progress, 20);

    // ---20%
    await $.post(data.urls.routeAdminCourse + "?m=courseN", { course: course })
        .done(async function (result) {
            console.log(result);
            let r = JSON.parse(result);
            let id = Number(r.response.ID);
            console.log('courseID', id);

            await updateProgress(progress, 30);

            // ---30%;
            await $.post(data.urls.routeAdminCourse + "?m=teachersN&id=" + id, { teachers: teachers })
                .done(await function (result) {
                    //let r = JSON.parse(result);
                    console.log('teachers', result);
                });
            await updateProgress(progress, 40);

            // --40%
            await $.post(data.urls.routeAdminCourse + "?m=branchesN&id=" + id, { branches: branches })
                .done(await function (result) {
                    //let r = JSON.parse(result);
                    console.log('branches', result);
                });
            await updateProgress(progress, 50);

            // ---50%
            await $.post(data.urls.routeAdminCourse + "?m=classesN&id=" + id, { classes: classes })
                .done(await function (result) {
                    //let r = JSON.parse(result);
                    console.log('classes', result);
                });
            await updateProgress(progress, 60);

            // ---60%
            await $.post(data.urls.routeAdminCourse + "?m=lessonsN&id=" + id, { lessons: lessons })
                .done(await function (result) {
                    //let r = JSON.parse(result);
                    console.log('lessons', result);
                });
            await updateProgress(progress, 70);

            // ---70%
            await $.post(data.urls.routeAdminCourse + "?m=packagesN&id=" + id, { packages: packages })
                .done(await function (result) {
                    //let r = JSON.parse(result);
                    console.log('packages', result);
                });
            await updateProgress(progress, 80);

            // ---100%
            await $.post(data.urls.routeAdminCourse + "?m=picturesN&id=" + id, { pictures: pictures })
                .done(await function (result) {
                    //let r = JSON.parse(result);
                    console.log('pictures', result);
                });
            await updateProgress(progress, 100);

            await db.removeObject(name.basic);
            await db.removeObject(name.course);

            setTimeout(function () {
                $('#loading').toggle(false);
                $('#page').toggle(true);
                window.location.href = data.urls.pageAdminManageCourses;
            }, 1000);
        });
}

async function updateProgress(element, percent) {
    element.style.width = await percent + "%";
    element.innerHTML = await percent + "%";
}
