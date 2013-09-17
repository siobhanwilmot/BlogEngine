<?php
class CommentsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function indexComment() {
        $this->set('comments', $this->Comment->find('all'));
    }

    public function viewComment($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid comment'));
        }

        $comment = $this->Comment->findById($id);
        if (!$comment) {
            throw new NotFoundException(__('Invalid comment'));
        }
        $this->set('comment', $comment);
    }

    public function addComment() {
        if ($this->request->is('comment')) {
            $this->Comment->create();
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash(__('Your comment has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your comment.'));
        }
    }

    public function editComment($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid comment'));
	    }

	    $comment = $this->Comment->findById($id);
	    if (!$comment) {
	        throw new NotFoundException(__('Invalid comment'));
	    }

	    if ($this->request->is('comment') || $this->request->is('put')) {
	        $this->Comment->id = $id;
	        if ($this->Comment->save($this->request->data)) {
	            $this->Session->setFlash(__('Your comment has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your comment.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $comment;
	    }
	}
public function deleteComment($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Comment->delete($id)) {
	        $this->Session->setFlash(__('The comment with id: %s has been deleted.', h($id)));
	        return $this->redirect(array('action' => 'index'));
	    }
	}
}