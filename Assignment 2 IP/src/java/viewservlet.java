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
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author deept
 */
@WebServlet(urlPatterns = {"/viewservlet"})
public class viewservlet extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            Class.forName("com.mysql.jdbc.Driver");
            Connection conn=DriverManager.getConnection("jdbc:mysql://localhost:3306/products","root","");
            out.println("<html><body>");
            out.println("<h1>Product List</h1>");
            out.println("<table border='1' cellpadding='10'>");
            out.println("<tr><th>Product id</th><th>Product name</th><th>Product Owner</th></tr>");
            String sql="SELECT prod_id,prod_name,prod_owner FROM product";
            PreparedStatement stmt=conn.prepareStatement(sql);
            ResultSet rs=stmt.executeQuery();
            while(rs.next()){
                int id_prod=rs.getInt("prod_id");
                String name_prod=rs.getString("prod_name");
                String owner_prod=rs.getNString("prod_owner");
                out.println("<tr><th>"+id_prod+"</th>"+"<th>"+name_prod+"</th>"+"<th>"+owner_prod+"</th></tr>");
            }
            out.println("</table>");
            out.println("</body></html>");
            
        } catch(ClassNotFoundException | NumberFormatException | SQLException e){
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
     * Handles the HTTP <code>POST</code> method.
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
