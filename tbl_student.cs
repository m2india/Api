using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Amirthaa_snd
{
    #region Tbl_student
    public class Tbl_student
    {
        #region Member Variables
        protected int _id;
        protected string _name;
        protected string _email;
        protected int _mobile;
        protected string _course;
        protected int _status;
        protected unknown _crated_at;
        #endregion
        #region Constructors
        public Tbl_student() { }
        public Tbl_student(int id, string name, string email, int mobile, string course, int status, unknown crated_at)
        {
            this._id=id;
            this._name=name;
            this._email=email;
            this._mobile=mobile;
            this._course=course;
            this._status=status;
            this._crated_at=crated_at;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual int Mobile
        {
            get {return _mobile;}
            set {_mobile=value;}
        }
        public virtual string Course
        {
            get {return _course;}
            set {_course=value;}
        }
        public virtual int Status
        {
            get {return _status;}
            set {_status=value;}
        }
        public virtual unknown Crated_at
        {
            get {return _crated_at;}
            set {_crated_at=value;}
        }
        #endregion
    }
    #endregion
}