<?php
/**
 * Created by PhpStorm.
 * User: c2
 * Date: 7/13/18
 * Time: 11:37 AM
 */

namespace App\Utils;


class Constants
{
    //NAME OF THE FIELDS FROM REQUEST
    public const RQ_USER_ID = 'user_id';

    //NAME OF THE COLUMNS IN THE DATABASE
    public const DBC_USER_ID = 'user_id';
    public const DBC_CODE_NAME = 'code_name';
    public const DBC_SCHOOL_NAME = 'school_name';
    public const DBC_TITLE = 'title';
    public const DBC_EXAM_SCORE = 'exam_score';
    public const DBC_ACAD_SESS_ID = 'academic_session_id';
    public const DBC_ACAD_TERM_ID = 'academic_term_id';
    public const DBC_TERM_START_DATE = 'term_start_date';
    public const DBC_TERM_END_DATE = 'term_end_date';
    public const DBC_CLASS_ID = 'class_id';
    public const DBC_CLASS_TERM_ID = 'class_term_id';
    public const DBC_REF_ID = 'id';
    public const DBC_REF_REG_CODE = 'reg_code';
    public const DBC_REF_CODE_NAME = 'code_name';

        public const DBCV_USER_TYPE_CANDIDATE = 'candidate';
        public const DBCV_USER_TYPE_STUDENT = 'student';
        public const DBCV_USER_TYPE_STAFF = 'staff';
        public const DBCV_USER_TYPE_ADMIN = 'admin';


    public const DBCV_GENDER_TYPE_MALE = 'male';
    public const DBCV_GENDER_TYPE_FEMALE = 'female';

    //AL: ALLOWABLE VALUE
    public const AV_USER_TYPE= [self::DBCV_USER_TYPE_CANDIDATE, self::DBCV_USER_TYPE_STUDENT,
        self::DBCV_USER_TYPE_STAFF, self::DBCV_USER_TYPE_ADMIN,];

    public const AV_GENDER_TYPE= [self::DBCV_GENDER_TYPE_MALE, self::DBCV_GENDER_TYPE_FEMALE, ];


}