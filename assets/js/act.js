document.addEventListener('input', function (event) {
    if (event.target.classList.contains('inputTextBox')) {
        var inputValue = event.target.value;
        var validCharactersRegex = /^[a-zA-Z\s]*$/;
        if (!validCharactersRegex.test(inputValue)) {
            event.target.value = inputValue.replace(/[^a-zA-Z\s]/g, '');
        }
    }
});

document.addEventListener('input', function (event) {
    if (event.target.classList.contains('numbervalue')) {
        var inputValue = event.target.value;
        var validNumbersRegex = /^[0-9]*$/;
        if (!validNumbersRegex.test(inputValue)) {
            event.target.value = inputValue.replace(/[^0-9]/g, '');
        }
    }
});
window.onload = function () {
    duDatepicker('.datepicker', {
        maxDate: 'today',
        auto: true,
        cancelBtn: false,
        format: 'yyyy-mm-dd',
        events: {
            dateChanged: function (data) {
            }
        }
    })
}
$(document).ready(function () {
    var getUrl = window.location.href;
    var lastPathSegment = getUrl.substring(getUrl.lastIndexOf('/') + 1);
    lastPathSegment = lastPathSegment.split('?')[0].split('#')[0];
    if (lastPathSegment == "competency-based-books-question-bank.php") {
        getBooksData('10');
    }

    $('.getTc').on('click', function () {
        $('.getTc').attr('disabled', 'disabled');
        $('.loader').show();
        var admissionNo = $('#admissionNo').val().trim();
        var dob = $('#dob').val();
        if (admissionNo == '') {
            alert('Kindly Enter Admission No.');
            $('.loader').hide();
            $('.getTc').removeAttr('disabled', 'disabled');
            return false;
        } else if (dob == '') {
            alert('Kindly Enter Date of Birth');
            $('.loader').hide();
            $('.getTc').removeAttr('disabled', 'disabled');
            return false;
        } else {
            $.ajax({
                url: 'searchData.php',
                type: "GET",
                data: { admno: admissionNo, dob: dob },
                success: function (res) {
                    if (res != '') {
                        var data = JSON.parse(res);
                        if (data.error == "error") {
                            alert('Kindly enter correct Admission No. and Date of birth.');
                            $('.loader').hide();
                            $('.getTc').removeAttr('disabled', 'disabled');
                            return false;
                        } else {
                            $('#getstuName').val(data.stuName);
                            $('#getclassname').val(data.className);
                            $('#getfathername').val(data.fatherName);
                            $('#getmothername').val(data.motherName);
                            $('#getstuAdmNo').val(data.enrollmentno);
                            $('#getcertificateNo').val(data.transfer_certificate_no);
                            $('#getDateofWithdrawal').val(data.deactive_date);
                            $('.downloadBtn').attr("onclick", `window.open('${data.tcUrl}','_blank')`);
                            $('.tcContainer').show();
                            $('.tcGetContainer').hide();
                        }
                    } else {
                        alert('Kindly enter correct Admission No. and Date of birth.');
                    }
                    $('.loader').hide();
                    $('.getTc').removeAttr('disabled', 'disabled');
                }, error: function (error) {
                    console.error(error);
                }
            })
        }
    });
    $('.getLabData').on('click', function () {
        $('#leftSideMenu').find('.active-leftPage').removeClass('active-leftPage');
        $(this).children().addClass('active-leftPage');
        getlabData($(this).attr('lab-data'));
    });

    $('.selectedBlogMonth').on('click', 'span', function () {
        $('.selectedBlogMonth').find('.active').removeClass('active');
        $(this).addClass('active');
        const blogMonth = $(this).attr('data-val');
        const blogMonthName = $(this).text();
        const blogYear = $('.selectedBlogYear').text();
        if (blogMonth != '' && blogYear != '' && blogYear != "Select Years") {
            getfilteredDataForBlog(blogMonth, blogYear, blogMonthName);
        }
    });

    $('.blogYear').on('click', 'li', function () {
        const yBlog = $(this).attr('data-val');
        const blogMonthName = $('.selectedBlogMonth').find('.active').text();
        const blogMonth = $('.selectedBlogMonth').find('.active').attr('data-val');
        if (blogMonth != undefined && blogMonth != '' && yBlog != '' && yBlog != "Select Years") {
            getfilteredDataForBlog(blogMonth, yBlog, blogMonthName);
        }
    });
    $('.forClassBooks').on('click', function () {
        $('.booksClassWiseDiv').find('.activeBook').removeClass('activeBook');
        $(this).addClass('activeBook');
        var dataVal = $(this).attr('data-val');
        if (dataVal) {
            getBooksData(dataVal);
        }
    });
});


function getBooksData(className) {
    if (className) {
        $('.loader').fadeIn();
        $.ajax({
            url: "searchData.php",
            type: "POST",
            data: { className: className },
            success: function (res) {
                $('#getClassWiseData').html('');
                if (res) {
                    $('#getClassWiseData').html(res);
                    $('.loader').fadeOut();
                } else {
                    $('#getClassWiseData').html("<tr><td>1.</td><td>No Data Found.</td><td></td></tr>");
                    $('.loader').fadeOut();
                }
            }
        });
    }
}

function getlabData(labData) {
    if (labData != '') {
        $('.loader').fadeIn();
        $.ajax({
            url: 'searchData.php',
            type: "GET",
            data: { labDa: labData },
            success: function (res) {
                if (res != '') {
                    var data = JSON.parse(res);
                    $('#filteredData').html(data.desc);
                    $('#filteredDataName').html(data.name);
                    $('.loader').fadeOut();
                } else {
                    $('#filteredData').html("<p>Coming Soon...</p>");
                    $('.loader').fadeOut();
                }
            },
            error: function (error) { console.error(error); }
        });
    }
}

function getfilteredDataForBlog(monthdata, yearData, blogMonthName) {
    $('.loader').fadeIn();
    $.ajax({
        url: "../searchData.php",
        type: "post",
        data: { blogMonthdata: monthdata, blogYearData: yearData },
        success: function (res) {
            if (res != '') {
                $('.filterSearchBlogData').html('<div class="searchText text-success"><h2> Search Results for: <span>' + blogMonthName + " " + yearData + '</span> </h2><hr class="text-dark"></div>' + res);
                $('.loader').fadeOut();
                $('.selectedBlogYear').text(yearData);
            } else {
                $('.loader').fadeOut();
                $('.filterSearchBlogData').html(`<div class="searchText text-success"><h2> Search Results for: <span>${blogMonthName} ${yearData}</span> </h2><hr class="text-dark"></div><article class="mb-3"><h3 class="mb-3">No Blog Found</h3></article>`);
            }
        },
        error: function (error) {
            $('.loader').fadeOut();
            console.error(error);
        }
    });
}
function getPreviusBlogYearData(yearYbd) {
    let mYearYbd = yearYbd - 1;
    $('.loader').fadeIn();
    $.ajax({
        url: "../searchData.php",
        type: "post",
        data: { yearYbdata: mYearYbd },
        success: function (res) {
            if (res != '') {
                $('.filterSearchBlogData').html(res);
                let newDate = new Date();
                if (newDate.getFullYear() == mYearYbd) {
                    $('.filterSearchBlogData').append("<hr><p class='mt-3 preYbd d-flex' onclick='getPreviusBlogYearData(" + mYearYbd + ")' year-val='" + mYearYbd + "'><a href='javascript:void(0)'  class='btn  blog-btn btn-sm' ><i class='fa fa-chevron-left me-1'></i> Older Post</a></p>");
                } else {
                    $('.filterSearchBlogData').append("<hr><p class='mt-3 preYbd d-flex justify-content-between' ><a href='javascript:void(0)' onclick='getPreviusBlogYearData(" + mYearYbd + ")' class='btn  blog-btn btn-sm' year-val='" + mYearYbd + "'><i class='fa fa-chevron-left me-1'></i> Older Post</a><a href='javascript:void(0)' class='btn blog-btn btn-sm' onclick='getnextBlogYearData(" + mYearYbd + ")' year-val='" + mYearYbd + "'> Go Back <i class='fa fa-chevron-right me-1'></i></a></p>");
                }
                $('.loader').fadeOut();
            } else {
                $('.loader').fadeOut();
                $('.filterSearchBlogData').html(`<div class="searchText text-success"><h2> Search Results for: <span>${mYearYbd}</span> </h2><hr class="text-dark"></div><article class="mb-3"><h3 class="mb-3">No Blog Found</h3></article>`);
                $('.filterSearchBlogData').append("<hr><p class='mt-3 preYbd d-flex justify-content-end' onclick='getnextBlogYearData(" + mYearYbd + ")' year-val='" + mYearYbd + "'><a href='javascript:void(0)' class='btn blog-btn btn-sm'> Go Back <i class='fa fa-chevron-right me-1'></i></a></p>")
                $('.loader').fadeOut();
            }
        },
        error: function (error) {
            $('.loader').fadeOut();
            console.error(error);
        }
    });
}

function getnextBlogYearData(yearYbd) {
    let mYearYbd = yearYbd + 1;
    $('.loader').fadeIn();
    $.ajax({
        url: "../searchData.php",
        type: "post",
        data: { yearYbdata: mYearYbd },
        success: function (res) {
            if (res != '') {
                $('.filterSearchBlogData').html(res);
                var newDate = new Date();
                if (newDate.getFullYear() == mYearYbd) {
                    $('.filterSearchBlogData').append("<hr><p class='mt-3 preYbd d-flex' onclick='getPreviusBlogYearData(" + mYearYbd + ")' year-val='" + mYearYbd + "'><a href='javascript:void(0)'  class='btn  blog-btn btn-sm' ><i class='fa fa-chevron-left me-1'></i> Older Post</a></p>");
                } else {
                    $('.filterSearchBlogData').append("<hr><p class='mt-3 preYbd d-flex justify-content-between' ><a href='javascript:void(0)' onclick='getPreviusBlogYearData(" + mYearYbd + ")' class='btn  blog-btn btn-sm' year-val='" + mYearYbd + "'><i class='fa fa-chevron-left me-1'></i> Older Post</a><a href='javascript:void(0)' class='btn blog-btn btn-sm' onclick='getnextBlogYearData(" + mYearYbd + ")' year-val='" + mYearYbd + "'> Go Back <i class='fa fa-chevron-right me-1'></i></a></p>");
                }
                $('.loader').fadeOut();
            } else {
                $('.loader').fadeOut();
                $('.filterSearchBlogData').html(`<div class="searchText text-success"><h2> Search Results for: <span>${mYearYbd}</span> </h2><hr class="text-dark"></div><article class="mb-3"><h3 class="mb-3">No Blog Found</h3></article>`);
                $('.filterSearchBlogData').append("<hr><p class='mt-3 preYbd d-flex justify-content-end' onclick='getnextBlogYearData(" + mYearYbd + ")' year-val='" + mYearYbd + "'><a href='javascript:void(0)' class='btn blog-btn btn-sm'><i class='fa fa-chevron-left me-1'></i> Older Post</a></p>")
                $('.loader').fadeOut();
            }
        },
        error: function (error) {
            $('.loader').fadeOut();
            console.error(error);
        }
    });
}