/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */

import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

public class Servelt1 extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();
        try{
            
            String studentName=request.getParameter("studentName");
            String rollno=request.getParameter("rollno");
            String gender=request.getParameter("gender");
            String year=request.getParameter("year");
            String department=request.getParameter("department");
            String section=request.getParameter("section");
            String mobile_no=request.getParameter("mobile_no");
            String email_id=request.getParameter("email_id");
            String address=request.getParameter("address");
            String city=request.getParameter("city");
            String country=request.getParameter("country");
            String pincode=request.getParameter("pincode");

            
            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet RegisterServlet</title>");
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Form Details :</h1>");
            out.println("<p>Name of Student : "+studentName+"</p>");
            out.println("<p>Roll No. of Student : "+rollno+"</p>");
            out.println("<p>Gender of Student : "+gender+"</p>");
            out.println("<p>Year of Study : "+year+"</p>");
            out.println("<p>Department : "+department+"</p>");
            out.println("<p>Section : "+section+"</p>");
            out.println("<p>Contact No. of Student : "+mobile_no+"</p>");
            out.println("<p>Email ID of Student : "+email_id+"</p>");
            out.println("<p>Address of Student : "+address+"</p>");
            out.println("<p>City : "+city+"</p>");
            out.println("<p>Country : "+country+"</p>");
            out.println("<p>Pincode : "+pincode+"</p>");
            out.println("</body>");
            out.println("</html>");
        }
        catch(Exception e){
            out.println(e);
        }
    }

}