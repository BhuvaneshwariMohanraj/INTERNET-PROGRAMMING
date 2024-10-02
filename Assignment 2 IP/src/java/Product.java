/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*;
/**
 *
 * @author deept
 */
@WebServlet(urlPatterns = {"/Product"})
public class Product extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();
out.println("test product");
        try {
           Integer pro1did= Integer.parseInt(request.getParameter("prodid"));
           String prod1name=request.getParameter("prodname");
           String prod1owner=request.getParameter("prodowner");
           Class.forName("com.mysql.jdbc.Driver");
            Connection conn=DriverManager.getConnection("jdbc:mysql://localhost:3306/products","root","");
            out.println("connection created.....");
             //String sql = "INSERT INTO product VALUES (?, ?, ?)";
          PreparedStatement stmt= conn.prepareStatement("insert into product values(?, ?, ?)");//sql);
           stmt.setInt(1,pro1did);
           stmt.setString(2,prod1name);
           stmt.setString(3,prod1owner);
            stmt.executeUpdate();
           out.println("<html><body>");
           out.println("inserted successfully");
           out.println("</body></html>");
        }catch(ClassNotFoundException | NumberFormatException | SQLException e){
            System.out.println("sorry");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
   
    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
