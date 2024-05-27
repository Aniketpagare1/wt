// src/components/BookItem.js
import React, { useState } from 'react';

const BookItem = ({ book, index, deleteBook, updateBook }) => {
  const [isEditing, setIsEditing] = useState(false);
  const [editedBook, setEditedBook] = useState(book);

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setEditedBook({ ...editedBook, [name]: value });
  };

  const handleUpdate = () => {
    updateBook(index, editedBook);
    setIsEditing(false);
  };

  return (
    <li>
      {isEditing ? (
        <>
          <input
            type="text"
            name="title"
            value={editedBook.title}
            onChange={handleInputChange}
          />
          <input
            type="text"
            name="author"
            value={editedBook.author}
            onChange={handleInputChange}
          />
          <button onClick={handleUpdate}>Save</button>
        </>
      ) : (
        <>
          <strong>{book.title}</strong> by {book.author}
          <button onClick={() => setIsEditing(true)}>Edit</button>
          <button onClick={() => deleteBook(index)}>Delete</button>
        </>
      )}
    </li>
  );
};

export default BookItem;
