using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using AppGuardia.Models;

namespace AppGuardia.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            ViewBag.Message = "Modify this template to jump-start your ASP.NET MVC application.";

            return View();
        }

        public JsonResult RegistrarEmpresa(Empresa empresa)
        {
            //conectarme a la base de datos Ef y guardar

            return Json(true, JsonRequestBehavior.AllowGet);
        }

        public JsonResult DevolverEmpresa()
        {
            var nuevaEmpresa = new Empresa()
            {
                Email = "Empresa@hotmail.com",
                Nombre = "Paposoft",
                Clave = "Papo1234"
            };
            return Json(nuevaEmpresa, JsonRequestBehavior.AllowGet);
        }



        public ActionResult About()
        {
            ViewBag.Message = "Your app description page.";

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }
    }
}
