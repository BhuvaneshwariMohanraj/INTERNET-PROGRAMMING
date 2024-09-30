import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

@WebServlet("/Servlet21")
public class Servlet21 extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response) 
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String action = request.getParameter("action");
        String accno = request.getParameter("accno");

        // Validate accession number
        if (accno == null || accno.isEmpty() || !isNumeric(accno)) {
            out.println("<h3>Invalid Accession Number!</h3>");
            return;
        }

        // Handle Insert, Update, and Delete operations
        switch (action) {
            case "insert":
                String title = request.getParameter("title");
                String author = request.getParameter("author");
                String publisher = request.getParameter("publisher");
                String edition = request.getParameter("edition");
                String price = request.getParameter("price");

                // Perform insertion logic
                out.println("<h3>Book Inserted Successfully</h3>");
                out.println("<p>Accession Number: " + accno + "</p>");
                out.println("<p>Title: " + title + "</p>");
                out.println("<p>Author: " + author + "</p>");
                out.println("<p>Publisher: " + publisher + "</p>");
                out.println("<p>Edition: " + edition + "</p>");
                out.println("<p>Price: " + price + "</p>");
                break;

            case "update":
                // For update, initially only the Accession number is given
                out.println("<h3>Enter the details to be updated:</h3>");
                out.println("<form action='Servlet21' method='POST'>");
                out.println("<input type='hidden' name='accno' value='" + accno + "'>");
                out.println("<input type='hidden' name='action' value='updateConfirm'>");
                out.println("<label for='title'>Book Title:</label>");
                out.println("<input type='text' id='title' name='title'><br><br>");
                out.println("<label for='author'>Author:</label>");
                out.println("<input type='text' id='author' name='author'><br><br>");
                out.println("<label for='publisher'>Publisher:</label>");
                out.println("<input type='text' id='publisher' name='publisher'><br><br>");
                out.println("<label for='edition'>Edition:</label>");
                out.println("<input type='text' id='edition' name='edition'><br><br>");
                out.println("<label for='price'>Price:</label>");
                out.println("<input type='text' id='price' name='price'><br><br>");
                out.println("<input type='submit' value='Submit Changes'>");
                out.println("</form>");
                break;

            case "updateConfirm":
                // After entering the new details, the update is confirmed
                String updatedTitle = request.getParameter("title");
                String updatedAuthor = request.getParameter("author");
                String updatedPublisher = request.getParameter("publisher");
                String updatedEdition = request.getParameter("edition");
                String updatedPrice = request.getParameter("price");

                // Perform update logic
                out.println("<h3>Book Updated Successfully</h3>");
                out.println("<p>Accession Number: " + accno + "</p>");
                out.println("<p>Updated Title: " + updatedTitle + "</p>");
                out.println("<p>Updated Author: " + updatedAuthor + "</p>");
                out.println("<p>Updated Publisher: " + updatedPublisher + "</p>");
                out.println("<p>Updated Edition: " + updatedEdition + "</p>");
                out.println("<p>Updated Price: " + updatedPrice + "</p>");
                break;

            case "delete":
                // Perform delete logic
                out.println("<h3>Book with Accession Number " + accno + " Deleted Successfully</h3>");
                break;

            default:
                out.println("<h3>Invalid Action!</h3>");
                break;
        }

        out.close();
    }

    // Helper function to check if a string is numeric
    private boolean isNumeric(String str) {
        try {
            Integer.parseInt(str);
            return true;
        } catch (NumberFormatException e) {
            return false;
        }
    }
}
