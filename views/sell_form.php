<form action="sell.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        Category:<select name="category" required="required" placeholder="Category">
                    <option value="books">Books</option>
                    <option value="clothing">Clothing</option>
                    <option value="electronics">Electronics</option>
                    <option value="furniture">Furniture</option>
                    <option value="sport">Sport</option>
                    <option value="vehicles">Vehicles</option>
                    <option value="others">Others</option>
                 </select><br/>
        Title:<input type="text" required autofocus placeholder="Eg:Watch Min. length(4chars)" minlength="4" name="title"/><br/>
        Description:<input type="text" required placeholder="Details Maxlength(200 chars)" maxlength="200" name="description"/><br/>
        Contact:<input type="text" required placeholder="Minimum length(4 chars)" minlength="4" name="contact"/><br/>
        I want to:<input type="radio" value="donate" name="donate">donate <input type="radio" value="sell" name="donate" checked>sell<br/>
        Your Price:<input type="text" name="price" required><br/>
        Upload Image:<input type="file" name="image" accept="image/*"><br/><br/>
        <button type="submit">
            Submit
        </button>
    </fieldset>
</form>